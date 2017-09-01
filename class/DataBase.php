<?php
/**
 * Created by PhpStorm.
 * User: sotula
 * Date: 31.08.2017
 * Time: 20:34
 */


/*
 * Библиотека, встроенная в PHP5+(С++)
 * абстрактный класс для соединения и работы с БД
 * Поддерживает большое количества разных СУБД. Не нужно полностью переписывать код для работы с конкретной СУБД
 * Работает быстрее чем mysql_connnect....
 *
 * */
class DataBase
{
    private $login = "root";
    private $password = "";
    private $host = "localhost";
    private $dbname = "webdb";
    private $dbType = "mysql";
    private $dbConnection = "";
    private $dbpath = "c:/localDB.db";



    public function connect(){

        $dbFirstLine = "";

        switch ($this->dbType){
            case "mysql":{
                $dbFirstLine = "mysql:host=$this->host;dbname=$this->dbname";
                break;
            }
            case "sqlite":{
                $dbFirstLine = "sqlite:$this->dbpath";
                break;
            }
            case "postgresql":{
                $dbFirstLine ="pgsql:host=$this->host dbname=$this->dbname";
                break;
            }
        }

        try{
            $this->dbConnection = new PDO($dbFirstLine, $this->login, $this->password);
        } catch(PDOException $pdoEx){
            die('Connection ERROR, ' . $pdoEx->getMessage());
        }

        return true;
    }

    public function setUser($userArr){
        $this->connect();

        /*Подготовка запроса, но не выполнение
         * ПОЗИЦИОННЫЕ ПЛЕЙСДХОДЕРЫ(placeholder) ?
         *
         *Именные плейсходеры
         * */
        $in1 = $this->dbConnection->prepare("INSERT INTO `user`(`login`, `password`, `email`, `name`, `surname`, `age`, `sex`, `salt`)
                                  VALUES (:login, :password, :email, :name, :surname, :age, :sex, :salt)");


        //Выполнение хранимой процедуры
        $in1->execute($userArr);

        $this->dbConnection = "";
    }

    public function showUsers(){
        $this->connect();

        $sql = "SELECT * FROM user";
        $answ = $this->dbConnection->query($sql);
        $answ->setFetchMode(PDO::FETCH_NUM);

        while($row = $answ->fetch(PDO::FETCH_LAZY)){
            echo "<pre>";
            var_dump($row);
            echo "</pre><br><br>";
        }


    }
}