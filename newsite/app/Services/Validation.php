<?php

namespace App\Services;
use App\Services\DatabaseHandler;


class Validation
{
    const REG_EXP_PASS = '/(?=^.{6,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/';

//    public static function checkEmpty($name, $password, $confirm_password, $email, $login): bool
//    {
//        if(!empty($name) && !empty($password) && !empty($confirm_password) && !empty($email) && !empty($login)){
//            return true;
//        }else{
//            $response =[
//                "status" => false,
//                "massage" => 'Не все поля заполнены'
//            ];
//            echo json_encode($response);
//            return false;
//        }
//    }

    public static function checkPassword($password): bool
    {
        if(preg_match(self::REG_EXP_PASS, $password)){
            return true;
        }else{
            $response =[
                "status" => false,
                "field" => 4,
                "massage" => 'Пароль не прошел валидацию'
            ];
            echo json_encode($response);
            return false;
        }
    }

    public static function checkEmail($email):bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $dbItem = new DatabaseHandler();
            if($dbItem->findUserByEmail($email)){
                $response =[
                    "status" => false,
                    "field" => 3,
                    "massage" => 'Пользователь с таким Email уже существует'
                ];
                echo json_encode($response);
                return false;
            }
            return true;
        }else{
            $response =[
                "status" => false,
                "field" => 3,
                "massage" => 'Неверно указан емэйл'
            ];
            echo json_encode($response);
            return false;
        }
    }

    public static function checkConfirmPassword($password, $confirm_password):bool
    {
        if($password === $confirm_password){
            return true;
        }else{
            $response =[
                "status" => false,
                "field" => 5,
                "massage" => 'пароли не совпадают'
            ];
            echo json_encode($response);
            return false;
        }
    }

    public static function checkLogin($login):bool{
        if(mb_strlen($login)>5){
            $dbItem = new DatabaseHandler();
            $user = $dbItem->checkUniqueLogin($login);
            if(!$user){
                $response = [
                    "status" => false,
                    "field" => 2,
                    "massage" => 'Пользователь с таким логином уже существует'
                ];
                echo json_encode($response);
                return false;
            }
            return true;
        }else{
            $response =[
                "status" => false,
                "field" => 2,
                "massage" => 'логин должен состоять минимум из 6 символов'
            ];
            echo json_encode($response);
            return false;
        }
    }

    public static function checkName($name):bool{
        if(strlen($name)>=2){
            return true;
        }else{
            $response =[
                "status" => false,
                "field" => 1,
                "massage" => 'Имя пользователь должно состоять минимум из 2 символов'
            ];
            echo json_encode($response);
            return false;
        }
    }

    public static function checkFieldSpace($field):bool{
        for($i=0;$i<strlen($field);$i++){
            if($field[$i] == ' '){
                $response =[
                    "status" => false,
                    "massage" => 'В полях формы имеются пробелы!!!'
                ];
                echo json_encode($response);
                return false;
            }
        }
        return true;
    }

}