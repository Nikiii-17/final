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
        ->select('rider.last_name, rider.first_name, rider.country, result.*, stage.*')
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
    
    
        $data['dvojka'] = $this->stage
        ->select('result.rank AS celk')
        ->join('result', 'result.id_stage = stage.id')
        ->join('rider', 'result.id_rider = rider.id')
        ->where('stage.id', $id) 
        ->where('result.id_rider', $data['detail']->id_rider)
        ->where('result.type_result', 4) 
        ->first();

    return view('info', $data);
    //var_dump($data['detail']);  
}
}
                 

   
    

        

