<?php

namespace MuslimahGuide\Service;

use MuslimahGuide\data\role;
use MuslimahGuide\Domain\user;
use MuslimahGuide\Exception\validationException;
use MuslimahGuide\Model\adminRequest;
use MuslimahGuide\Model\adminResponse;
use MuslimahGuide\Repository\UserRepository;

class adminService
{
    private UserRepository $userRepo;

    public function __construct($userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function login(adminRequest $request) : adminResponse{
        $user = $this->userRepo->get(["email" => $request->email]);
        if($user == null){
            throw new validationException("email tidak ditemukan");
        }

        $user = $this->userRepo->get(["email" => $request->email, "password" => $request->password]);
        if($user == null){
            throw new validationException("password tidak sesuai");
        }

        if($user->getRole() == "admin"){
            throw new validationException("Hanya user yang dapat login");
        }

        $response = new adminResponse();
        $response->user = $user;
        return $response;
    }

    public function loginWeb(adminRequest $request) : adminResponse{
        $user = $this->userRepo->get(["username" => $request->username]);
        if($user == null){
            throw new validationException("username tidak ditemukan");
        }

        $user = $this->userRepo->get(["username" => $request->username, "password" => $request->password]);
        if($user == null){
            throw new validationException("password tidak sesuai");
        }

        if($user->getRole() == "user"){
            throw new validationException("Hanya admin yang dapat login");
        }

        $response = new adminResponse();
        $response->user = $user;
        return $response;
    }

    public function loginEmail(adminRequest $request) : adminResponse{
        $request->validateUserEmailRequest($request->email);

        $user = $this->userRepo->get(["email" => $request->email]);
        if($user == null){
            throw new validationException("email or password is wrong");
        }

        if($user->getRole() == "user"){
            throw new validationException("Hanya admin yang dapat login");
        }

        $response = new adminResponse();
        $response->user = $user;
        return $response;
    }

    public function register(adminRequest $request) :adminResponse{
        $request -> validateRegisterRequest($request->email, $request->username, $request->password);

        $user = $this->userRepo->get(["email" => $request->email]);
        if($user !== null){
            throw new validationException("email sudah digunakan");
        }

        $user = new user(null,null, null, role::user, null, $request->email, $request->username, $request->password);
        $user->setId($this->userRepo->addAll($user));

        $response = new adminResponse();
        $response->user = $user;
        return $response;
    }
}