<?php
require_once "../config/connect_db.php";
require_once "../classes/Teachers.php";
require_once "../classes/Objects.php";
require_once "../classes/Department.php";

$title = htmlspecialchars($_POST['title']);

if(empty($title)){
    die('Заполните поле название');
}

Objects::writeToObjects($pdo, $title);

header('location: /objects/index.php');

die();