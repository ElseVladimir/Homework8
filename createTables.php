<?php
include_once "config/connect_db.php";
include_once "classes/TableCreate.php";

TableCreate::relations($pdo);

TableCreate::teacher_create($pdo);

TableCreate::objects_create($pdo);

TableCreate::departments_create($pdo);

