<?php

namespace App\Service;

use App\Entity\Measure;
use App\Entity\Node;
use App\Entity\Notification;
use App\Entity\Place;
use App\Repository\MeasureRepository;
use App\Repository\NodeRepository;
use App\Repository\NotificationRepository;
use App\Repository\PlaceRepository;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use function Symfony\Component\Clock\now;

class Helpers
{
    public function __construct(
        NodeRepository $nodeRepository,
        MeasureRepository $measureRepository,
        PlaceRepository $placeRepository,
        NotificationRepository $notificationRepository,
        LoggerInterface $logger,
        MessageHandler $messageHandler,
    ) {
        $this->logger = $logger;
        $this->nodeRepository = $nodeRepository;
        $this->notificationRepository = $notificationRepository;
        $this->placeRepository = $placeRepository;
        $this->measureRepository = $measureRepository;
        $this->messageHandler = $messageHandler;
    }
    public function getLastMeasureByNodeId(string $name, Place $place): Measure
    {
        $node = $this->getTargetNodeId($name, $place, true);
        $params = ['node' => $node];
        $measures = $this->measureRepository->findBy($params, ['time' => 'DESC'], 1, 0);

        return $measures[0];
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function variatorHandler(
        Place $place,
        int $row,
        string $targetNodeId,
        int $cmdId,
    ): void {
        $placeId = $place->getId();

        for ($i = 0; $i < $row; $i++) {
            $this->messageHandler->sendMessage($targetNodeId, $placeId, $cmdId);
        }

        $this->placeRepository->update($place);
    }

    public function toggleLight(Place $place): void
    {
        $placeId = $place->getId();
        $targetNodeId = $this->getTargetNodeId('light', $place);
        $place->setLightState(!$place->isLightState());

        if ($place->isLightState()) {
            $this->messageHandler->sendMessage($targetNodeId, $placeId, 207);
        } else {
            $this->messageHandler->sendMessage($targetNodeId, $placeId, 208);
        }

        $this->placeRepository->update($place);
    }

    public function getTargetNodeId(string $name, Place $place, bool $entity = false): string|Node
    {
        $params = ['place' => $place, 'name' => $name];
        $targetNode = $this->nodeRepository->findBy($params);

        if ($entity) {
            return $targetNode[0];
        }

        return $targetNode[0]->getId();
    }

    public function saveNotification($message): void
    {
        try {
            $notification = new Notification();
            $notification->setMessage($message);
            $notification->setTime(now());
            $this->notificationRepository->save($notification, true);
        } catch (\Exception $e) {
            $this->logger->error($e);
        }
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function shutAllDown(Place $place, bool $shutVent = false): void
    {
        $placeId = $place->getId();

        if ($place->isLightState()) {
            $targetNodeId = $this->getTargetNodeId('light', $place);
            $place->setLightState(false);

            $this->messageHandler->sendMessage($targetNodeId, $placeId, 208);
        }

        if ($place->getHeaterState() > 0) {
            $targetNodeId = $this->getTargetNodeId('heater', $place);

            for ($i = 0; $i < $place->getheaterState(); $i++) {
                $this->messageHandler->sendMessage($targetNodeId, $placeId, 202);
            }

            $place->setHeaterState(0);
        }

        if ($place->getVentState() > 0 && $shutVent) {
            $targetNodeId = $this->getTargetNodeId('vent', $place);

            for ($i = 0; $i < $place->getVentState(); $i++) {
                $this->messageHandler->sendMessage($targetNodeId, $placeId, 206);
            }

            $place->setVentState(0);
        }

        if ($place->getAcState() > 0) {
            $targetNodeId = $this->getTargetNodeId('ac', $place);

            for ($i = 0; $i < $place->getAcState(); $i++) {
                $this->messageHandler->sendMessage($targetNodeId, $placeId, 204);
            }

            $place->setAcState(0);
        }
    }

}
