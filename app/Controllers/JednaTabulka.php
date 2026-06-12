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
        $etapy = $this->stage->findAll();
        $vse = $this->stage
            ->select('rider.last_name, rider.first_name, result.*, stage.*')
            ->join('race_year', 'stage.id_race_year = race_year.id', 'left')
            ->join('race', 'race.id = race_year.id_race', 'left')
            ->join('result', 'result.id_stage = stage.id', 'left')
            ->join('rider', 'result.id_rider = rider.id', 'left')
            ->where('race_year.id', 646)
            ->where('result.rank', 1)
            ->where('type_result', 1)
            ->orderBy('number', 'asc')
            ->findAll();
            
        $data = [
            "etapy" => $etapy,
            "vse" => $vse
        ];

        return view('seznam_etap', $data);
    }

    public function edit($id)
    {
        $etapa = $this->stage->find($id);

        $data = [
            'etapa' => $etapa,
            'cislaEtap' => range(1, 7)
        ];

        return view('formular', $data);
    }
    public function update($id)
    {
        $updateData = [
            'number'    => $this->request->getPost('number'),
            'departure' => $this->request->getPost('departure'),
            'arrival'   => $this->request->getPost('arrival'),
            'date'      => $this->request->getPost('date'),
            'distance'  => $this->request->getPost('distance'),
            'map'       => $this->request->getPost('map'),
        ];

        $this->stage->update($id, $updateData);

        return redirect()->to('/');
    }
}
