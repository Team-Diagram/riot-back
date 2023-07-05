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
        $message = json_decode($request->getContent(), true);

        $data = json_decode($message['message'], true);

        $topic = explode('/', $message['topic']);
        $nodeId = $topic[count($topic) -2];
        $node = $nodeRepository->find($nodeId);

        if (!$node) {
            return $this->json([
                'status' => 'erreur',
                'message' => 'unknown nodeId',
                'nodeId' => $nodeId
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
