<?php
include_once "config/connect_db.php";
include_once "classes/TableCreate.php";

TableCreate::departments_create($pdo);

TableCreate::teacher_create($pdo);

TableCreate::objects_create($pdo);

TableCreate::relations($pdo);



