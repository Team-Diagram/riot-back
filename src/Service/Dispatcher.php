<?php

namespace App\Service;

use App\Entity\Measure;
use App\Repository\MeasureRepository;
use App\Repository\NodeRepository;
use App\Repository\PlaceRepository;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class Dispatcher
{
    public function __construct(
        PlaceRepository $placeRepository,
        NodeRepository $nodeRepository,
        MeasureRepository $measureRepository,
        LoggerInterface $logger,
        MessageHandler $messageHandler,
        Helpers $helpers,
    ) {
        $this->logger = $logger;
        $this->placeRepository = $placeRepository;
        $this->nodeRepository = $nodeRepository;
        $this->helpers = $helpers;
        $this->measureRepository = $measureRepository;
        $this->messageHandler = $messageHandler;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function discpatchSensor(Measure $measure): void
    {
        $sensorId = $measure->getSensorId();

        switch ($sensorId) {
            case 100:
                $this->passageRule($measure);
                break;
            case 101:
                $this->heaterRule($measure);
                break;
            case 102:
                $this->acRule($measure);
                break;
            case 103:
                $this->ventRule($measure);
                break;
            case 104:
                $this->lightRule($measure);
                break;
                /* case 114: */
            case 131:
                $this->humidityCo2Rule($measure);
                break;
            case 118:
                $this->luminosityRule($measure);
                break;
            case 136:
                $this->adcRule($measure);
                break;
            case 112:
                $this->temperatureRule($measure);
                break;
            default:
                break;
        }
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function passageRule(Measure $measure): void
    {
        $persons = $measure->getValue()['persons'];
        $place = $measure->getNode()->getPlace();
        $place->setPeopleCount($persons);

        if (0 === $persons || $place->isShutDown()) {
            $shutVent = $place->isShutDown();
            $this->helpers->shutAllDown($place, $shutVent);
        }
        try {
            $this->placeRepository->update($place);
        } catch (\Exception $e) {
            $this->logger->error($e);
        }
    }

    private function heaterRule(Measure $measure): void
    {
        $heater = $measure->getValue()['heat'];
        $place = $measure->getNode()->getPlace();

        if ($place->getHeaterState() !== $heater) {
            $place->setHeaterState($heater);

            $this->placeRepository->update($place);
        }
    }

    private function acRule(Measure $measure): void
    {
        $ac = $measure->getValue()['ac'];
        $place = $measure->getNode()->getPlace();

        if ($place->getAcState() !== $ac) {
            $place->setAcState($ac);

            $this->placeRepository->update($place);
        }
    }

    private function ventRule(Measure $measure): void
    {
        $vent = $measure->getValue()['vent'];
        $place = $measure->getNode()->getPlace();

        if ($place->getVentState() !== $vent) {
            $place->setVentState($vent);

            $this->placeRepository->update($place);
        }
    }

    private function lightRule(Measure $measure): void
    {
        $light = $measure->getValue()['light'];
        $place = $measure->getNode()->getPlace();

        if ($place->isLightState() !== $light) {
            $place->setLightState($light);

            try {
                $this->placeRepository->update($place);
            } catch (\Exception $e) {
                $this->logger->error($e);
            }
        }
    }

    /**
     * @throws TransportExceptionInterface
     */
    private function humidityCo2Rule(Measure $measure): void
    {
        try {
            $co2 = $measure->getValue()['co2'];
            $place = $measure->getNode()->getPlace();
            $targetNodeId = $this->helpers->getTargetNodeId('vent', $place);

            if (!$place->isShutDown()) {
                if ($co2 > 3000 || $place->getPeopleCount() >= 45) {
                    if (12 === $place->getVentState()) {
                        return;
                    }
                    if ($place->getVentState() > 12) {
                        $row = $place->getVentState() - 12;
                        $cmdId = 206;
                    } else {
                        $row = 12 - $place->getVentState();
                        $cmdId = 205;
                    }
                    $place->setVentState(12);
                    $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                } elseif ($co2 > 2700 || $place->getPeopleCount() >= 40) {
                    if (10 === $place->getVentState()) {
                        return;
                    }
                    if ($place->getVentState() > 10) {
                        $row = $place->getVentState() - 10;
                        $cmdId = 206;
                    } else {
                        $row = 10 - $place->getVentState();
                        $cmdId = 205;
                    }
                    $place->setVentState(10);
                    $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                } elseif ($co2 > 2500 || $place->getPeopleCount() >= 32) {
                    if (8 === $place->getVentState()) {
                        return;
                    }
                    if ($place->getVentState() > 8) {
                        $row = $place->getVentState() - 8;
                        $cmdId = 206;
                    } else {
                        $row = 8 - $place->getVentState();
                        $cmdId = 205;
                    }
                    $place->setVentState(8);
                    $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                } elseif ($co2 > 2200 || $place->getPeopleCount() >= 27) {
                    if (6 === $place->getVentState()) {
                        return;
                    }
                    if ($place->getVentState() > 6) {
                        $row = $place->getVentState() - 6;
                        $cmdId = 206;
                    } else {
                        $row = 6 - $place->getVentState();
                        $cmdId = 205;
                    }
                    $place->setVentState(6);
                    $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                } elseif ($co2 > 2000 || $place->getPeopleCount() >= 20) {
                    if (5 === $place->getVentState()) {
                        return;
                    }
                    if ($place->getVentState() > 5) {
                        $row = $place->getVentState() - 5;
                        $cmdId = 206;
                    } else {
                        $row = 5 - $place->getVentState();
                        $cmdId = 205;
                    }
                    $place->setVentState(5);
                    $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                } elseif ($co2 > 1500 || $place->getPeopleCount() >= 15) {
                    if (3 === $place->getVentState()) {
                        return;
                    }
                    if ($place->getVentState() > 3) {
                        $row = $place->getVentState() - 3;
                        $cmdId = 206;
                    } else {
                        $row = 3 - $place->getVentState();
                        $cmdId = 205;
                    }
                    $place->setVentState(3);
                    $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                } elseif ($co2 > 1000 || $place->getPeopleCount() >= 7) {
                    if (2 === $place->getVentState()) {
                        return;
                    }
                    if ($place->getVentState() > 2) {
                        $row = $place->getVentState() - 2;
                        $cmdId = 206;
                    } else {
                        $row = 2 - $place->getVentState();
                        $cmdId = 205;
                    }
                    $place->setVentState(2);
                    $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                } elseif ($place->getPeopleCount() > 0) {
                    if (1 === $place->getVentState()) {
                        return;
                    }
                    if ($place->getVentState() > 1) {
                        $row = $place->getVentState() - 1;
                        $cmdId = 206;
                    } else {
                        $row = 1 - $place->getVentState();
                        $cmdId = 205;
                    }
                    $place->setVentState(1);
                    $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                }

                if ($co2 > 2000) {
                    $notificationMessage = [
                        'co2' => $co2,
                        'info' => 'co2 superieur a 700',
                        'placeId' => $place->getId(),
                    ];

                    $this->helpers->saveNotification($notificationMessage);
                }
            }

            if (
                $place->getVentState() > 0
                && $measure->getValue()['co2'] <= 700
                && $place->getPeopleCount() < 1
            ) {
                $row = $place->getVentState();
                $place->setVentState(0);
                $this->helpers->variatorHandler($place, $row, $targetNodeId, 206);
            }
        } catch (\Exception $e) {
            $this->logger->error($e);
        }
    }

    /**
     * @throws TransportExceptionInterface
     */
    private function luminosityRule(Measure $measure): void
    {
        $place = $measure->getNode()->getPlace();
        $targetNodeId = $this->helpers->getTargetNodeId('light', $place);
        $placeId = $place->getId();

        if ($measure->getValue()['lux'] > 1000 && $place->getPeopleCount() > 0 && $place->isLightState()) {
            $place->setLightState(false);
            $this->placeRepository->update($place);
            $this->messageHandler->sendMessage($targetNodeId, $placeId, 208);
        }
    }

    /**
     * @throws TransportExceptionInterface
     */
    private function adcRule(Measure $measure): void
    {
        $place = $measure->getNode()->getPlace();
        if ($measure->getValue()['adc'] >= 1) {
            $this->helpers->shutAllDown($place, true);
            $place->setShutDown(true);

            $notificationMessage = [
                'adc' => $measure->getValue()['adc'],
                'info' => 'fuite d eau',
                'placeId' => $place->getId(),
            ];

            $this->helpers->saveNotification($notificationMessage);

            try {
                $this->placeRepository->update($place);
            } catch (\Exception $e) {
                $this->logger->error($e);
            }
        }
    }

    /**
     * @throws TransportExceptionInterface
     */
    private function temperatureRule(Measure $measure): void
    {
        $place = $measure->getNode()->getPlace();
        $temperature = $measure->getValue()['temperature'];

        if (!$place->isShutDown()) {
            if ($temperature > 27 && $place->getPeopleCount() > 0) {
                try {
                    $targetNodeId = $this->helpers->getTargetNodeId('ac', $place);
                    if ($place->getPeopleCount() >= 40) {
                        if (6 === $place->getAcState()) {
                            return;
                        }

                        if ($place->getAcState() > 6) {
                            $row = $place->getAcState() - 6;
                            $cmdId = 204;
                        } else {
                            $row = 6 - $place->getAcState();
                            $cmdId = 203;
                        }
                        $place->setAcState(6);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    } elseif ($place->getPeopleCount() >= 32) {
                        if (5 === $place->getAcState()) {
                            return;
                        }

                        if ($place->getAcState() > 5) {
                            $row = $place->getAcState() - 5;
                            $cmdId = 204;
                        } else {
                            $row = 5 - $place->getAcState();
                            $cmdId = 203;
                        }
                        $place->setAcState(5);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    } elseif ($place->getPeopleCount() >= 24) {
                        if (4 === $place->getAcState()) {
                            return;
                        }

                        if ($place->getAcState() > 4) {
                            $row = $place->getAcState() - 4;
                            $cmdId = 204;
                        } else {
                            $row = 4 - $place->getAcState();
                            $cmdId = 203;
                        }
                        $place->setAcState(4);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    } elseif ($place->getPeopleCount() >= 16) {
                        if (3 === $place->getAcState()) {
                            return;
                        }

                        if ($place->getAcState() > 3) {
                            $row = $place->getAcState() - 3;
                            $cmdId = 204;
                        } else {
                            $row = 3 - $place->getAcState();
                            $cmdId = 203;
                        }
                        $place->setAcState(3);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    } elseif ($place->getPeopleCount() >= 8) {
                        if (2 === $place->getAcState()) {
                            return;
                        }

                        if ($place->getAcState() > 2) {
                            $row = $place->getAcState() - 2;
                            $cmdId = 204;
                        } else {
                            $row = 2 - $place->getAcState();
                            $cmdId = 203;
                        }
                        $place->setAcState(2);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    } elseif ($place->getPeopleCount() > 0) {
                        if (1 === $place->getAcState()) {
                            return;
                        }

                        if ($place->getAcState() > 1) {
                            $row = $place->getAcState() - 1;
                            $cmdId = 204;
                        } else {
                            $row = 1 - $place->getAcState();
                            $cmdId = 203;
                        }
                        $place->setAcState(1);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    }

                    if ($place->getAcState() > 0 && $place->getHeaterState() > 0) {
                        $row = $place->getHeaterState();
                        $cmdId = 202;
                        $targetNodeId = $this->helpers->getTargetNodeId('heater', $place);

                        $place->setHeaterState(0);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    }

                    $this->placeRepository->update($place);
                } catch (\Exception $e) {
                    $this->logger->error($e);
                }
            }

            if ($temperature < 19 && $place->getPeopleCount() > 0) {
                try {
                    $targetNodeId = $this->helpers->getTargetNodeId('heater', $place);
                    if ($place->getPeopleCount() >= 30 && $place->getHeaterState() > 0) {
                        $row = $place->getHeaterState();
                        $cmdId = 202;

                        $place->setHeaterState(0);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    } elseif ($place->getPeopleCount() >= 25) {
                        if (1 === $place->getHeaterState()) {
                            return;
                        }

                        if ($place->getHeaterState() > 1) {
                            $row = $place->getHeaterState() - 1;
                            $cmdId = 202;
                        } else {
                            $row = 1 - $place->getHeaterState();
                            $cmdId = 201;
                        }
                        $place->setHeaterState(1);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    } elseif ($place->getPeopleCount() >= 20) {
                        if (2 === $place->getHeaterState()) {
                            return;
                        }

                        if ($place->getHeaterState() > 2) {
                            $row = $place->getHeaterState() - 2;
                            $cmdId = 202;
                        } else {
                            $row = 2 - $place->getHeaterState();
                            $cmdId = 201;
                        }
                        $place->setHeaterState(2);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    } elseif ($place->getPeopleCount() >= 15) {
                        if (3 === $place->getHeaterState()) {
                            return;
                        }

                        if ($place->getHeaterState() > 3) {
                            $row = $place->getHeaterState() - 3;
                            $cmdId = 202;
                        } else {
                            $row = 3 - $place->getHeaterState();
                            $cmdId = 201;
                        }
                        $place->setHeaterState(3);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    } elseif ($place->getPeopleCount() >= 10) {
                        if (4 === $place->getHeaterState()) {
                            return;
                        }

                        if ($place->getHeaterState() > 4) {
                            $row = $place->getHeaterState() - 4;
                            $cmdId = 202;
                        } else {
                            $row = 4 - $place->getHeaterState();
                            $cmdId = 201;
                        }
                        $place->setHeaterState(4);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    } elseif ($place->getPeopleCount() > 0) {
                        if (5 === $place->getHeaterState()) {
                            return;
                        }

                        if ($place->getHeaterState() > 5) {
                            $row = $place->getHeaterState() - 5;
                            $cmdId = 202;
                        } else {
                            $row = 5 - $place->getHeaterState();
                            $cmdId = 201;
                        }
                        $place->setHeaterState(5);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    }

                    if ($place->getAcState() > 0 && $place->getHeaterState() > 0) {
                        $row = $place->getAcState();
                        $cmdId = 204;
                        $targetNodeId = $this->helpers->getTargetNodeId('ac', $place);

                        $place->setAcState(0);
                        $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                    }

                    $this->placeRepository->update($place);
                } catch (\Exception $e) {
                    $this->logger->error($e);
                }
            }

            if ($temperature > 19 && $temperature < 27 && $place->getPeopleCount() > 0) {
                if ($place->getAcState() > 0) {
                    $row = $place->getAcState();
                    $cmdId = 204;
                    $targetNodeId = $this->helpers->getTargetNodeId('ac', $place);

                    $place->setAcState(0);
                    $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                }

                if ($place->getHeaterState() > 0) {
                    $row = $place->getHeaterState();
                    $cmdId = 202;
                    $targetNodeId = $this->helpers->getTargetNodeId('heater', $place);

                    $place->setHeaterState(0);
                    $this->helpers->variatorHandler($place, $row, $targetNodeId, $cmdId);
                }
            }
        }
    }
}
