<?php
require_once "../config/connect_db.php";
require_once "../classes/Teachers.php";
require_once "../classes/Objects.php";
require_once "../classes/Department.php";

$title = htmlspecialchars($_POST['title']);
$id = htmlspecialchars($_POST['id']);

if(empty($title)){
    die('Заполните поле названия');
}
if(empty($id)){
    die('404');
}

Objects::updateObject($pdo, $title, $id);

header('location: /objects/index.php');

die();