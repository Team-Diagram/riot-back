<?php

namespace App\Normalizer;

use App\Entity\Measure;
use App\Entity\Node;

class SensorNormalizer
{
    public function normalize(array $data, Node $node): ?Measure
    {
        $dateTime = new \DateTime();
        $measure = new Measure();
        $measure->setTime($dateTime->setTimestamp($data['tx_time_ms_epoch']));
        $measure->setSensorId($data['sensor_id']);
        $measure->setNode($node);
        $measure->setValue($data['data']);

        return $measure;
    }
}
