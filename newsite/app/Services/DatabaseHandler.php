<?php

namespace App\Services;

use App\Entity\User;

class DatabaseHandler
{
    private $users;

    public function __construct(){
        if(file_exists(__DIR__ . '/db.json')){
            return $this->users = json_decode(file_get_contents(__DIR__ . '/db.json'), true);
        }else{
            return $this->users = null;
        }
    }

    public function __destruct()
    {
        $this->users = NULL;
    }

    public function createUser($user)
    {
        $this->users[] = $user;
        $this->putDataInJson($this->users);
    }

    private function putDataInJson($user)
    {
        file_put_contents(__DIR__ . '/db.json', json_encode($user, JSON_PRETTY_PRINT));
        $response = [
            "status" => true,
            "massage" => 'Пользователь успешно зарегестрирован'
        ];
        echo json_encode($response);
    }

    public function checkUniqueLogin($login){
        if($this->users == null){return true;}
        foreach ($this->users as $user){
            if ($user['login'] === $login){
                return false;
            }
        }
        return true;
    }

    public function findUser($login){
        if($this->users == null){
            $response =[
                "status" => false,
                "massage" => 'Не найдено пользователей (БД пуста)'
            ];
            echo json_encode($response);
            die();
        }else{
            foreach ($this->users as $user){
                if ($user['login'] === $login){
                    return new User($user['name'], $user['login'], $user['password'], $user['salt'], $user['email']);
                }
            }
        }
    }

    public function findUserByEmail($email):bool{
        if($this->users == null){
            return false;
        }else{
            foreach($this->users as $user){
                if($user['email'] === $email){
                    return true;
                }
            }
            return false;
        }
    }
}