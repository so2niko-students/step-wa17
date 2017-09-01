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
    private $salt = "";

    //Гетэры и Сэтеры
    //Get & Set

    public function  __construct($login, $password, $email, $name, $surname, $age, $sex){
        $this->login = $login;
        $this->email = $email;
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->sex = $sex;
        $this->salt =  $this->genSalt();
        $this->password = crypt($password, '$5$rounds=999000$' .$this->salt);
    }

    private function genSalt(){
        $salt = "";
        for($i = 0; $i < 16; $i++){
            $salt .= chr(rand(33,126));
        }
        return $salt;
    }

    public function getFullName(){
        return $this->surname . " " . $this->name;
    }

    public function setPassword($password){
        if(1 === preg_match('/\w{8,30}/g', $password)){
            $this->password = $password;
            return true;
        } else{
            return false;
        }
    }

    public function setEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
            return true;
        } else{
            return false;
        }
    }

    public function getAge(){
        return $this->age;
    }

    public function getSex(){
        return $this->sex;
    }

    public function getUserArr(){
        $userArr = [':login' => $this->login,
                    ':password' => $this->password,
                    ':email' => $this->email,
                    ':name' => $this->name,
                    ':surname' => $this->surname,
                    ':age' => $this->age,
                    ':sex' => $this->sex,
                    ':salt' => $this->salt];

        return $userArr;
    }
}