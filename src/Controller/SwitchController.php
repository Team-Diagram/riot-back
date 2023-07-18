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
        $maxValue = 12;
        $data = json_decode($request->getContent(), true);
        $placeId = $data['place_id'];
        $value = $data['value'];
        $place = $place->find($placeId);
        $nodeId = $helper->getTargetNodeId('vent',$place);

        if($value > $maxValue){
            $value = $maxValue;
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
        $maxValue = 6;
        $data = json_decode($request->getContent(), true);
        $placeId = $data['place_id'];
        $value = $data['value'];
        $place = $place->find($placeId);
        $nodeId = $helper->getTargetNodeId('ac',$place);

        if($value > $maxValue){
            $value = $maxValue;
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
        $maxValue = 6;
        $data = json_decode($request->getContent(), true);
        $placeId = $data['place_id'];
        $value = $data['value'];
        $place = $place->find($placeId);
        $nodeId = $helper->getTargetNodeId('heating',$place);

        if($value > $maxValue){
            $value = $maxValue;
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

    #[Route('/api/switchAll/{action}',name:'app_switch_all',methods:['POST'])]
    public function shutdown (Request $request,PlaceRepository $placeRepository,Helpers $helper,$action){
        $data = json_decode($request->getContent(), true);
        $placesId = $data['place_id'];

        $active = true;
        if($action==='shutdown'){
            $active = false;
        }

        foreach($placesId as $placeId){
            $place = $placeRepository->find($placeId);
            $place->setShutDown($active);
            if(!$active){
                $helper->shutAllDown($place,true);
            }
            $placeRepository->update($place);
        }
    }

    #[Route('/switch/light', name: 'app_switch_light', methods:['POST'])]
    public function light(Request $request,PlaceRepository $placeRepository,Helpers $helper):JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $placeId = $data['place_id'];
        $place = $placeRepository->find($placeId);

        $helper->toggleLight($place);

        return $this->json([
            'status' => self::SUCCESS,
            'message'=> "Lumiere modifiee"
        ]);
    }
}
