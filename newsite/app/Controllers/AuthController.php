<?php

namespace App\Controllers;

use App\Services\DatabaseHandler;
use App\Services\Router;

class AuthController
{
    private $dbItem;

    public function __construct()
    {
        $this->dbItem = new DatabaseHandler();
    }
    public function __destruct()
    {
        $this->dbItem = NULL;
    }

    public function auth($data):void{
        foreach ($data as $value){
            if(empty($value)){
                die();
            }
        }
        $login = $data['login'];
        $password = $data['password'];
        $user = $this->dbItem->findUser($login);
        if($user){
            if($user->getPassword() === md5($password . $user->getSalt())){
                session_start();
                setcookie("user", $user->getName(), time()+3600,"/");
                $_SESSION['user'] = [
                    "username" => $user->getLogin(),
                    "name" => $user->getName()
                ];
                $response = [
                    "status" => true
                ];
                echo json_encode($response);
                die();
            }else{
                $response = [
                    "status" => false,
                    "field" => 4,
                    "massage" => "неверный пароль"
                ];
                echo json_encode($response);
            }
        }else{
            $response =[
                "status" => false,
                "field" => 2,
                "massage" => 'Пользоваетль с таким логином не найден'
            ];
            echo json_encode($response);
        }
        exit;
    }

    public function logout():void{
        session_start();
        unset($_COOKIE['user']);
        setcookie('user', null, -1,'/');
        unset($_SESSION['user']);

        Router::redirect('/login');
    }
}