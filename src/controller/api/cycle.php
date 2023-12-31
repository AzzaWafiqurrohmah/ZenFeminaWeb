<?php

namespace MuslimahGuide\controller\api;

use Google\Service\AdExchangeBuyerII\Date;
use MuslimahGuide\Config\database;
use MuslimahGuide\Domain\cycleEst;
use MuslimahGuide\Domain\cycleHistory;
use MuslimahGuide\Exception\validationException;
use MuslimahGuide\Model\api\cycleRequest;
use MuslimahGuide\Repository\CycleEstRepository;
use MuslimahGuide\Repository\CycleHistRepository;
use MuslimahGuide\Repository\SessionRepository;
use MuslimahGuide\Repository\UserRepository;
use MuslimahGuide\Service\api\cycleService;
use MuslimahGuide\trait\APIResponser;

class cycle
{
    use APIResponser;

    private CycleHistRepository $cycleHistRepo;
    private CycleEstRepository $cycleEstRepo;
    private UserRepository $userRepo;
    private SessionRepository $sessionRepo;
    private cycleService $cycleService;

    public function __construct()
    {
        $connection = database::getConnection();
        $this->cycleEstRepo = new CycleEstRepository($connection);
        $this->cycleHistRepo = new CycleHistRepository($connection);

        $this->userRepo = new UserRepository($connection);
        $this->sessionRepo = new SessionRepository($connection);

        $this->cycleService = new cycleService();
    }

    public function question(){
        $request = new cycleRequest();
        $request->token = $_POST['token'];
        $request->birthdate = $_POST['birthDate'];
        $request->lastDate = $_POST['lastDate'];
        $request->cycle = $_POST['cycle'];
        $request->period = $_POST['period'];

        try {
            $this->cycleService->question($request);
            $this->success("Data berhasil disimpan");
        } catch (validationException $exception){
            $this->error($exception->getMessage());
        }
    }

    public function beginCycle(){
        $request = new cycleRequest();
        $request->token = $_POST['token'];
        $request->dateBegin = $_POST['dateBegin'];
        $request->lastDate = $_POST['lastDateHist'];
        $request->cycleEst_id = $_POST['cycleEst_id'];
        $request->cycleHist_id = $_POST['cycleHist_id'];

        try {
            $this->cycleService->beginCycle($request);
            $this->success("Data Berhasil Diperbarui");
        } catch (validationException $exception){
            $this->error($exception->getMessage());
        }
    }

    public function completeCycle(){
        $request = new cycleRequest();
        $request->token = $_POST['token'];
        $request->lastDate = $_POST['lastDate'];
        $request->cycleEst_id = $_POST['cycleEst_id'];

        try {
            $this->cycleService->completeCycle($request);
            $this->success("Data Berhasil Diperbarui");
        } catch (validationException $exception){
            $this->error($exception->getMessage());
        }
    }

    public function continueCycle(){
        $request = new cycleRequest();
        $request->token = $_POST['token'];
        $request->cycleEst_id = $_POST['cycleEst_id'];

        try {
            $this->cycleService->continueCycle($request);
            $this->success("Data Berhasil Diperbarui");
        } catch (validationException $exception){
            $this->error($exception->getMessage());
        }
    }

    public function getHistory(){
        $request = new cycleRequest();
        $request->token = $_GET['token'];

        try {
            $data = $this->cycleService->getHistory($request);
            $this->successArray($data->data, "Data tersedia");
        } catch (validationException $exception){
            $this->error($exception->getMessage());
        }
    }

    public function getAllHistory(){
        $request = new cycleRequest();
        $request->token = $_GET['token'];

        try {
            $data = $this->cycleService->getAllHist($request);
            $this->successArray($data->data, "Data tersedia");
        } catch (validationException $exception){
            $this->error($exception->getMessage());
        }
    }


    public function getEstimation(){
        $request = new cycleRequest();
        $request->token = $_GET['token'];

        try{
            $data = $this->cycleService->getEst($request);
            $this->successArray($data->data, "Data tersedia");
        } catch (validationException $exception){
            $this->error($exception->getMessage());
        }
    }
}