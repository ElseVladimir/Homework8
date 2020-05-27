<?php
require_once "../config/connect_db.php";
require_once "../classes/Teachers.php";
require_once "../classes/Objects.php";
require_once "../classes/Department.php";

$objects = Objects::getObjects($pdo);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Предметы</title>
</head>
<body>
<h1>Предметы</h1>
    <table>
        <tr>
            <th>Название</th>
            <th>Удалить</th>
            <th>Редактировать</th>
        </tr>
        <?php foreach ($objects as $object):?>
        <tr>
            <td><?=$object->getTitle();?></td>
            <td><a href="delete.php?id=<?=$object->getId();?>">Удалить</a></td>
            <td><a href="updateForm.php?id=<?=$object->getId();?>">Редактировать</a></td>
        </tr>
        <?php endforeach;?>
    </table>
<hr>
<h2>Создать предмет</h2>
    <form action="create.php" method="post">
        <input name="title" placeholder="Введите название">
        <button>Send</button>
    </form>
</body>
</html>
