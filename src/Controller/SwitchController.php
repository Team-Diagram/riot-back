<?php

namespace App\Controller;

use App\Service\Helpers;
use App\Repository\PlaceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SwitchController extends AbstractController
{
    const SUCCESS = 'success';
    const FAIL = 'fail';

    #[Route('/api/switch/vent', name: 'app_switch_vent', methods:['POST'])]
    public function vent(Request $request,PlaceRepository $place,Helpers $helper): JsonResponse
    {
        $max_value = 12;
        $data = json_decode($request->getContent(), true);
        $place_id = $data['place_id'];
        $value = $data['value'];
        $place = $place->find($place_id);
        $nodeId = $helper->getTargetNodeId('vent',$place);

        if($value > $max_value){
            $value = $max_value;
        }

        if($value === $place->getVentState()){
            return $this->json([
                'status' => self::FAIL,
                'message'=> 'Ventilation déjà activée'
            ]);
        }elseif($value > $place->getVentState()){
            $row = $value - $place->getVentState();
            $cmdId = 205;
            $message = 'Ventilation augmentée';
        }else{
            $row = $place->getVentState() - $value;
            $cmdId = 206;
            $message = 'Ventilation diminuée';
        }

        $helper->variatorHandler($place, $row, $nodeId,$cmdId);

        return $this->json([
            'status' => self::SUCCESS,
            'message'=> $message
        ]);
    }

    #[Route('/api/switch/climatisation', name: 'app_switch_climatisation', methods:['POST'])]
    public function clim(Request $request,PlaceRepository $place,Helpers $helper): JsonResponse
    {
        $max_value = 6;
        $data = json_decode($request->getContent(), true);
        $place_id = $data['place_id'];
        $value = $data['value'];
        $place = $place->find($place_id);
        $nodeId = $helper->getTargetNodeId('ac',$place);

        if($value > $max_value){
            $value = $max_value;
        }

        if($value === $place->getAcState()){
            return $this->json([
                'status' => self::FAIL,
                'message'=> 'Climatisation déjà activée'
            ]);
        }elseif($value > $place->getAcState()){
            $row = $value - $place->getAcState();
            $cmdId = 203;
            $message = 'Climatisation augmentée';
        }else{
            $row = $place->getAcState() - $value;
            $cmdId = 204;
            $message = 'Climatisation diminuée';
        }

        $helper->variatorHandler($place, $row, $nodeId,$cmdId);

        return $this->json([
            'status' => self::SUCCESS,
            'message'=> $message
        ]);
    }

    #[Route('/api/switch/heater', name: 'app_switch_heater', methods:['POST'])]
    public function heater(Request $request,PlaceRepository $place,Helpers $helper): JsonResponse
    {
        $max_value = 6;
        $data = json_decode($request->getContent(), true);
        $place_id = $data['place_id'];
        $value = $data['value'];
        $place = $place->find($place_id);
        $nodeId = $helper->getTargetNodeId('heating',$place);

        if($value > $max_value){
            $value = $max_value;
        }

        if($value === $place->getHeaterState()){
            return $this->json([
                'status' => self::FAIL,
                'message'=> 'Chauffage déjà activée'
            ]);
        }elseif($value > $place->getHeaterState()){
            $row = $value - $place->getHeaterState();
            $cmdId = 201;
            $message = 'Chauffage augmentée';
        }else{
            $row = $place->getHeaterState() - $value;
            $cmdId = 202;
            $message = 'Chauffage diminuée';
        }

        $helper->variatorHandler($place, $row, $nodeId,$cmdId);

        return $this->json([
            'status' => self::SUCCESS,
            'message'=> $message
        ]);
    }
}
