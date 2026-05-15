<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Stage;
use Psr\Log\LoggerInterface;
use CodeIgniter\HTTP\RequestInterface;

class JednaTabulka extends BaseController
{
    protected $stage;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) 
    {
        parent::initController($request, $response, $logger); 
        $this->stage = new Stage();
    }

    public function index()
    {
        // vsechyn etapy
        $data = [
            "etapy" => $this->stage->findAll()
        ];
    
        // data
        return view('seznam_etap', $data);
    }

    public function vypis()
    {
        $data = [
            "vse" => $this->stage->join('etapa',)
        ];
        //('komponent', 'komponent.typKomponent_id = typkomponent.idKomponent', 'left')
    }
}