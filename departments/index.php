<?php
require_once "../config/connect_db.php";
require_once "../classes/Teachers.php";
require_once "../classes/Objects.php";
require_once "../classes/Department.php";

$departments = Department::getDepartments($pdo);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Departments</title>
</head>
<body>
<h1>Кафедры</h1>
    <table>
        <tr>
            <th>Кафедра</th>
            <th>Номер телефона</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        <?php foreach($departments as $department):?>
        <tr>
            <td><?=$department->getTitle();?></td>
            <td><?=$department->getTelNumber();?></td>
            <td><a href="updateform.php?id=<?=$department->getId();?>">Редактировать</a></td>
            <td><a href="delete.php?id=<?=$department->getId();?>">Удалить</a></td>
        </tr>
        <?php endforeach;?>
    </table>
<hr>
    <h3>Создать новую кафедру</h3>
    <form action="newCreate.php" method="post">
        <input name="title" placeholder="Название">
        <input name="telNumber" placeholder="Номер телефона">
        <button>Отправить</button>
    </form>
</body>
</html>
