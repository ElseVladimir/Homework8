<?php
require_once "config/connect_db.php";
require_once "classes/Teachers.php";

$getAll = Teachers::getDepartmentsToTeachers($pdo);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homework8</title>
</head>
<body>

    <div>
        <a href="/departments/">Кафедры</a><br>
        <a href="/objects/">предметы</a>
    </div>
    <h2>Преподы</h2>
    <table>
        <tr>
            <th>Имя преподователя</th>
            <th>Фамилия</th>
            <th>Кафедра</th>
        </tr>
        <?php foreach($getAll as $get):?>
        <tr>
            <td><?=$get['name'];?></td>
            <td><?=$get['surname'];?></td>
            <td><?=$get['depName'];?></td>
        </tr>
        <?php endforeach;?>
    </table>

</body>
</html>
