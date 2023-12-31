<?php

namespace MuslimahGuide\controller;

use MuslimahGuide\app\view;
use MuslimahGuide\Config\database;
use MuslimahGuide\Domain\user;
use MuslimahGuide\Repository\SessionRepository;
use MuslimahGuide\Repository\UserRepository;
use MuslimahGuide\Service\adminService;
use MuslimahGuide\Service\sessionService;

class profileController
{
    private user $user;
    private UserRepository $userRepo;
    private adminService $userService;
    private sessionService $sessionService;

    public function __construct()
    {
        $connection = database::getConnection();
        $this->userRepo = new UserRepository($connection);
        $this -> userService = new adminService($this->userRepo);

        $sessionRepo = new SessionRepository($connection);
        $this->sessionService = new sessionService($sessionRepo, $this->userRepo);

        $this-> user = $this->sessionService->current();
    }

    public function profile(){
        //header name

        $fullName = $this->user->getName();
        $userName = $this->user->getUsername();
        $email = $this->user->getEmail();
        $password = $this->user->getPassword();
        $phone = $this-> user->getPhone();
        $profileImg = $this->user->getProfileImg();


        view::render('profile', [
            'fullName' => $fullName,
            'userName' => $userName,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'profileImg' => $profileImg
        ]);
    }

    public function postProfile(){

        if(isset($_POST['sign-out'])){
            $this->sessionService->destroy();
            view::redirect('login');
            exit();
        }

        if(isset($_POST['changePassword'])){
            $currentPassword = $_POST['currentPassword'];
            $firstPassword = $_POST['firstPassword'];

            if($currentPassword == $this->user->getPassword()){
                $this->user->setPassword($firstPassword);
            }
            $this->userRepo->update($this->user);
            view::redirect('profile');
        }

        $profileImg = $this->user->getProfileImg();
        $password = $this->user->getPassword();

        $img = $_FILES['fileUpload']['name'];
        if($img != null){
            if($_POST['inputImg'] != null){
                $img = $_POST['inputImg'];

                $destination_path = getcwd() . DIRECTORY_SEPARATOR . 'assetsWeb' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR;
                $targetFile = $destination_path . basename($img);

                if(file_exists($targetFile)){
                    unlink($targetFile);
                }
            }
            //move img
            $destination_path = getcwd() . DIRECTORY_SEPARATOR . 'assetsWeb' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR;
            $targetFile = $destination_path . basename($img);
            move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetFile);

            $profileImg = $img;
        }

        $fullName = $_POST['fullName'];
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];


        $this->user->setProfileImg($profileImg);
        $this->user->setUsername($userName);
        $this->user->setName($fullName);
        $this->user->setEmail($email);
        $this->user->setPhone($phone);

        $this->userRepo->update($this->user);

        view::render('profile', [
            'fullName' => $fullName,
            'userName' => $userName,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'profileImg' => $profileImg
        ]);
    }
}
