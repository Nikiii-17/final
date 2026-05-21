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
   
    $data[
        'detail'] = $this->stage
        ->select('rider.last_name, rider.first_name, result.*, stage.*')
        ->join('race_year', 'stage.id_race_year = race_year.id')
        ->join('race','race.id = race_year.id_race')
        ->join('result', 'result.id_stage = stage.id')
        ->join('rider', 'result.id_rider = rider.id')
        ->where('stage.id', $id)       
        ->where('result.rank', 1)       
        ->where('result.type_result', 1)
        ->first();        
        //var_dump($data['detail']);              

    return view('info', $data);
}
        
    }

