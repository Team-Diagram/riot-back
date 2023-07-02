<?php

namespace App\Controller;

use App\Normalizer\SensorNormalizer;
use App\Repository\MeasureRepository;
use App\Repository\NodeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SensorController extends AbstractController
{
    #[Route('/sensor', name: 'getMessage', methods:['POST'])]
    public function index(
        Request $request,
        NodeRepository $nodeRepository,
        SensorNormalizer $sensorNormalizer,
        MeasureRepository $measureRepository
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (!array_key_exists('nodeId', $data)) {
            return $this->json([
                'status' => 'erreur',
                'message' => 'nodeId is missing',
            ]);
        }
        $node = $nodeRepository->find($data['nodeId']);

        if (!$node) {
            return $this->json([
                'status' => 'erreur',
                'message' => 'unknown nodeId',
            ]);
        }

        $measure = $sensorNormalizer->normalize($data, $node);

        //create check rules by nodeId (get placeId and maybe groupes)

        try {
            $measureRepository->save($measure, true);
            return $this->json([
                'status' => 'success',
                'message' => 'message traité',
            ]);
        } catch(\Exception $e) {
            return $this->json([
                'status' => 'erreur',
                'message' => $e,
            ]);
        }

    }
}
