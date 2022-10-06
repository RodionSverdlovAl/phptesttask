<?php

namespace App\Entity;

class User
{
    private $name, $login, $password, $salt, $email;

    public function __construct($name, $login, $password, $salt, $email){
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        $this->salt= $salt;
        $this->email = $email;
    }


    public function createArrayFromUser():array{
        return [
            'name'=>$this->name,
            'login'=>$this->login,
            'password'=>$this->password,
            'salt'=>$this->salt,
            'email'=>$this->email
        ];
    }

    public function getName():string{
        return $this->name;
    }

    public function getLogin():string{
        return $this->login;
    }

    public function getPassword():string{
        return $this->password;
    }

    public function getSalt():string{
        return $this->salt;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setName($name):void{
        $this->name = $name;
    }

    public function setLogin($login):void{
        $this->login = $login;
    }

    public function setPassword($password):void{
        $this->password = $password;
    }

    public function setSalt($salt):void{
        $this->salt= $salt;
    }

    public function setEmail($email):void{
        $this->email = $email;
    }

}