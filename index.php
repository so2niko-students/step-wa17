<?php
/**
 * Created by PhpStorm.
 * User: sotula
 * Date: 31.08.2017
 * Time: 21:06
 */

require_once "class/DataBase.php";
require_once "class/User.php";

$user1 = new User("dima1000", "12345666666", "dima1912@coco.m.ua", "Dmitriy", "Dmitrienko", 13, "М");

$db1 = new DataBase();

$db1->setUser($user1->getUserArr());