<?php
require_once "../config/connect_db.php";
require_once "../classes/Teachers.php";
require_once "../classes/Objects.php";
require_once "../classes/Department.php";

if(empty($_GET['id'])){
    die('404');
}
$id = htmlspecialchars($_GET['id']);

Department::deleteFromDepartments($pdo, $id);

header('location: /departments/index.php');
