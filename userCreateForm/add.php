<?php
require_once "../config/connect_db.php";
require_once "../classes/Teachers.php";
require_once "../classes/Objects.php";
$username = htmlspecialchars($_POST['username']);
$surname = htmlspecialchars($_POST['surname']);
$values = [];
if(!empty($_POST['value'])){
    foreach($_POST['value'] as $value){
        $values[] = htmlspecialchars($value);
        }
}else{
    die('Заполните все поля');
}; //массив айдишников предметов
$department = htmlspecialchars($_POST['department']); //айдишник кафедры
$email = htmlspecialchars($_POST['email']);

if(empty($username && $surname && $department && $email)){
    die('Заполните все поля!');
}

Teachers::writeTeacher($pdo, $username, $surname, $email, $department);

$teachers = Teachers::getLastId($pdo);

//выбирает последнего препода из таблицы и записывает его айди и айди предметов в связывающую таблицу
foreach($values as $val){
    foreach($teachers as $teacher){
        Objects::writeObjectsToRelation($pdo,$teacher->getId(),$val);
        }
}

header('location: index.php');

die();

