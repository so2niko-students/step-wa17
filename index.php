<?php
/**
 * Created by PhpStorm.
 * User: sotula
 * Date: 31.08.2017
 * Time: 21:06
 */

require_once "class/DataBase.php";
require_once "class/User.php";

$user1 = new User("Vladdddddd", "pwd", "vlad@gmail.com", "Vladislav", "Pr", 42, "M");

$db1 = new DataBase();

$db1->setUser($user1->getUserArr());
