<?php

namespace App\Controller;

use App\Repository\MeasureRepository;
use App\Repository\NodeRepository;
use App\Repository\NotificationRepository;
use App\Repository\PlaceRepository;
use Doctrine\DBAL\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class InfoController extends AbstractController
{
    /**
     * @throws Exception
     */
    #[Route('/states', name: 'states', methods: 'GET')]
    public function index(
        PlaceRepository $placeRepository,
    ): JsonResponse {
        $placeState = $placeRepository->getAllLastMeasureForEveryPlace();
        for ($i = 0; $i < count($placeState); $i++) {
            $measureToJson = json_decode($placeState[$i]['measure_values']);
            $placeState[$i]['measure_values'] = $measureToJson;
        }

        return $this->json([
            'info' => 'etat des salles',
            'message' => $placeState,
        ]);
    }

    #[Route('/notification', name: 'notif', methods: 'GET')]
    public function notification(
        NotificationRepository $notificationRepository
    ): JsonResponse {
        $notif = $notificationRepository->findBy(['opened' => false], ['time' => 'DESC']);

        return $this->json([
            'info' => 'alertes non traitées',
            'message' => $notif,
        ]);
    }

    /**
     * @throws Exception
     */
    #[Route('/voltage', name: 'voltage', methods: 'GET')]
    public function voltage(
        MeasureRepository $measure
    ): JsonResponse {
        $voltage = $measure->getVoltage();
        for ($i = 0; $i < count($voltage); $i++) {
            $measureToJson = json_decode($voltage[$i]['kwh']);
            $voltage[$i]['kwh'] = $measureToJson;
        }

        return $this->json([
            'info' => 'voltage de tout le batiment',
            'message' => $voltage,
        ]);
    }

    /**
     * @throws Exception
     */
    #[Route('/voltage/{placeId}', name: 'voltage-by-place', methods: 'GET')]
    public function voltageByPlace(
        Uuid $placeId,
        MeasureRepository $measure,
        NodeRepository $nodeRepository,
        PlaceRepository $placeRepository,
    ): JsonResponse {
        $place = $placeRepository->find($placeId);

        $nodeParams = [
            'place' => $place,
            'name' => 'voltage',
        ];
        $node = $nodeRepository->findBy($nodeParams);

        $voltage = $measure->getVoltageByNodeId($node[0]->getId());

        for ($i = 0; $i < count($voltage); $i++) {
            $measureToJson = json_decode($voltage[$i]['kwh']);
            $voltage[$i]['kwh'] = $measureToJson;
        }

        return new JsonResponse([
            'info' => "voltage salle $placeId",
            'placeId' => $placeId,
            'message' => $voltage,
        ]);
    }
}
