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

}