<?php
require_once "../config/connect_db.php";
require_once "../classes/Teachers.php";
require_once "../classes/Objects.php";
require_once "../classes/Department.php";

$id = htmlspecialchars($_GET['id']);

if(empty($id)){
    die('404');
}

Objects::deleteFromObjects($pdo, $id);

header('location: index.php');

die();