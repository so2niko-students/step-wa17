<?php
/**
 * Created by PhpStorm.
 * User: sotula
 * Date: 31.08.2017
 * Time: 20:34
 */

class DataBase
{
    private $login = "root";
    private $password = "";
    private $host = "localhost";
    private $dbname = "webdb";
    private $dbType = "mysql";
    private $dbConnection = "";

    public function connect(){
        $this->dbConnection = new PDO("$this->dbType . ':host=' . $this->host . ';dbname=' . $this->dbname",
            $this->login,
            $this->password);

        return $this->dbConnection;
    }

    public function setUser($userArr){
        $this->connect();

        $this->dbConnection->exec("INSERT INTO `user`(`login`, `password`, `email`, `name`, `surname`, `age`, `sex`, `salt`) 
                                  VALUES ($userArr[0], $userArr[1],
                                  $userArr[2],$userArr[3],$userArr[4]
                                  ,$userArr[5],$userArr[6],$userArr[7])");

        $this->dbConnection = "";
    }
}