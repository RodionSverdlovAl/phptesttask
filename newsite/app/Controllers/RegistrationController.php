<?php

namespace App\Controllers;
use App\Services\DatabaseHandler;
use App\Services\Validation;
use App\Entity\User;

class RegistrationController
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

//    public function register($data):void{ // функция регистрации в приложении
//        if(Validation::checkEmpty($data['name'],$data['password'], $data['confirm_password'], $data['email'],$data['login'])){
//            if(Validation::checkConfirmPassword($data['password'], $data['confirm_password'])
//                && Validation::checkLogin($data['login'])
//                && Validation::checkEmail($data['email'])
//                && Validation::checkPassword($data['password'])
//            ){
//                $salt = $this->CreateDynamicSalt(); // генерация динамической соли
//                $password = md5(trim($data['password']) . $salt); // засолка пароля
//                $user = new User(trim($data['name']),trim($data['login']), $password, $salt,trim($data['email']));
//                $this->dbItem->createUser($user->createArrayFromUser()); // отправка нового пользователя в базу данных
//            }
//        }
//    }

    public function register($data):bool{
        foreach ($data as $value){
            if(empty($value)){
                return false;
            }
        }
        foreach ($data as $value){
            if(!Validation::checkFieldSpace($value)){
                die();
            }
        }
        if(!Validation::checkConfirmPassword($data['password'], $data['confirm_password'])){
            die();
        }
        if(!Validation::checkLogin($data['login'])){
            die();
        }
        if(!Validation::checkEmail($data['email'])){
            die();
        }
        if(!Validation::checkPassword($data['password'])){
            die();
        }
        if(!Validation::checkName($data['name'])){
            die();
        }
        $salt = $this->CreateDynamicSalt(); // генерация динамической соли
        $password = md5($data['password'] . $salt); // засолка пароля
        $user = new User($data['name'],$data['login'], $password, $salt,$data['email']);
        $this->dbItem->createUser($user->createArrayFromUser()); // отправка нового пользователя в базу данных
        return true;
    }

    private function CreateDynamicSalt():string{
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $salt = '';
        for($i = 0; $i < 20; $i++) {
            $random_character = $permitted_chars[mt_rand(0, strlen($permitted_chars) - 1)];
            $salt .= $random_character;
        }
        return $salt;
    }
}