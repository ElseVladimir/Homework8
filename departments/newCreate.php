<?php
require_once "../config/connect_db.php";
require_once "../classes/Teachers.php";
require_once "../classes/Objects.php";
require_once "../classes/Department.php";

$title = htmlspecialchars($_POST['title']);
$telNumber = htmlspecialchars($_POST['telNumber']);

if(empty($title && $telNumber)){
    die('Заполните все поля');
}

Department::writeToDepartments($pdo, $title, $telNumber);

header('location: /departments/index.php');

die();