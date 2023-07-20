<?php

namespace App\Controller;

use App\Normalizer\SensorNormalizer;
use App\Repository\MeasureRepository;
use App\Repository\NodeRepository;
use App\Service\Dispatcher;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class SensorController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/sensor', name: 'getMessage', methods: ['POST'])]
    public function index(
        Request $request,
        NodeRepository $nodeRepository,
        SensorNormalizer $sensorNormalizer,
        MeasureRepository $measureRepository,
        Dispatcher $dispatcher,
        LoggerInterface $logger,
    ): JsonResponse {
        $message = json_decode($request->getContent(), true);

        $data = json_decode($message['message'], true);

        $topic = explode('/', $message['topic']);
        $nodeId = $topic[count($topic) - 2];
        $node = $nodeRepository->find($nodeId);

        if (!$node) {
            return $this->json([
                'status' => 'erreur',
                'message' => 'unknown nodeId',
                'nodeId' => $nodeId,
            ]);
        }

        $measure = $sensorNormalizer->normalize($data, $node);

        try {
            $dispatcher->discpatchSensor($measure);

            $measureRepository->save($measure, true);

            return $this->json([
                'status' => 'success',
                'message' => 'message traité',
                'measure' => $measure->getValue(),
                'nodeId' => $measure->getNode()->getId(),
            ]);
        } catch (\Exception $e) {
            $logger->error($e);

            return $this->json([
                'status' => 'erreur',
                'message' => $e,
            ]);
        }
    }
}
