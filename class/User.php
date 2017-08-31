<?php
/**
 * Created by PhpStorm.
 * User: sotula
 * Date: 31.08.2017
 * Time: 18:58
 */

class User
{
    private $login = "";
    private $password = "";
    private $email = "";
    private $name = "";
    private $surname = "";
    private $age = "";
    private $sex = "";
    private $userID = "";
    private $salt = "";

    //Гетэры и Сэтеры
    //Get & Set

    public function  __constructor($login, $password, $email, $name, $surname, $age, $sex){
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->sex = $sex;
    }

    public function getFullName(){
        return $this->surname . " " . $this->name;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    //2 get
    //1 set
}