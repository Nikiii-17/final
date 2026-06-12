<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Stage;
use Psr\Log\LoggerInterface;
use CodeIgniter\HTTP\RequestInterface;

class DvaProklik extends BaseController
{
    protected $stage;
    
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) 
    {
        parent::initController($request, $response, $logger); 
        $this->stage = new Stage();
    }

    public function index($id)
    {
        $data['detail'] = $this->stage
            ->select('rider.last_name, rider.first_name, rider.country, rider.id AS id_rider, result.*, stage.*')
            ->select('stage.vertical_meters AS vertikal') 
            ->select('parcour_type.name AS parcour_name')
            ->select('result.time AS cas') 
            ->join('race_year', 'stage.id_race_year = race_year.id')
            ->join('race','race.id = race_year.id_race')
            ->join('result', 'result.id_stage = stage.id')
            ->join('rider', 'result.id_rider = rider.id')
            ->join('parcour_type', 'stage.parcour_type = parcour_type.id')
            ->where('stage.id', $id)       
            ->where('result.rank', 1)  
            ->first();     

        $celkove_poradi = $this->stage
            ->select('result.rank AS celk, result.time AS celk_cas, rider.first_name, rider.last_name, rider.country')
            ->join('result', 'result.id_stage = stage.id')
            ->join('rider', 'result.id_rider = rider.id')
            ->where('stage.id', $id) 
            ->where('result.type_result', 4) 
            ->orderBy('result.rank', 'ASC')
            ->findAll();

        $winner = $this->stage
            ->select('result.time AS vitez_celk_cas')
            ->join('result', 'result.id_stage = stage.id')
            ->where('stage.id', $id)
            ->where('result.rank', 1)
            ->where('result.type_result', 4)
            ->first();
        
            if ($winner) {
                $cas_viteze = strtotime($winner->vitez_celk_cas);
            
                foreach ($celkove_poradi as $poradi => $zavodnik) {
            
                    if ($zavodnik->celk == 1) {
                        $celkove_poradi[$poradi]->kolik= 'Vede';
                    }
                    else {
                        $cas_zavodnika = strtotime($zavodnik->celk_cas);
                        $celkove_poradi[$poradi]->kolik = $cas_zavodnika - $cas_viteze;
                    }
                }
            }
            
            $data['celkove_poradi'] = $celkove_poradi;
            
            
        return view('info', $data);
    }
}
