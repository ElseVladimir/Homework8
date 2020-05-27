<?php
require_once "../config/connect_db.php";
require_once "../classes/Teachers.php";
require_once "../classes/Objects.php";
require_once "../classes/Department.php";

$title = htmlspecialchars($_POST['title']);
$telNumber = htmlspecialchars($_POST['telNumber']);
$id = htmlspecialchars($_POST['id']);

if(empty($id)){
    die('404');
}

if(empty($title && $telNumber)){
    die('Заполните все поля');
}

Department::updateDepartments($pdo, $title, $telNumber, $id);

header('location: /departments/index.php');

die();

