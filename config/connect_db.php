<?php
require_once "config.example.php";

try{
    $pdo = new PDO('mysql:host='.$connect['server'].';dbname='.$connect['name'],$connect['username'],$connect['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
}catch (Exception $exception){
    die('connection to db not established');
}
