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
        switch ($this->dbType){
            case "mysql":{
                $this->dbConnection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->login, $this->password);
                break;
            }
            case "sqlite":{
                $this->dbConnection = new PDO("sqlite:$this->dbpath", $this->login, $this->password);
                break;
            }
            case "postgresql":{
                $this->dbConnection = new PDO("pgsql:host=$this->host dbname=$this->dbname", $this->login, $this->password);
                break;
            }
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


        //Выполнение
        $in1->execute($userArr);

//        $this->dbConnection->exec("INSERT INTO `user`(`login`, `password`, `email`, `name`, `surname`, `age`, `sex`, `salt`)
//                                  VALUES ('dima1000', '12345666666', 'dima1912@coco.m.ua', 'Dmitriy', 'Dmitrienko', 13, 'M', 'djfkg1234k')");
//        $this->dbConnection->exec("INSERT INTO `user`(`login`, `password`, `email`, `name`, `surname`, `age`, `sex`, `salt`)
//                                  VALUES ($userArr[0], $userArr[1],
//                                  $userArr[2],$userArr[3],$userArr[4],
//                                  $userArr[5],$userArr[6],$userArr[7])");

        print_r($userArr);
        $this->dbConnection = "";
    }
}