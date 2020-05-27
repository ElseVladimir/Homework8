<?php
require_once "../config/connect_db.php";
require_once "../classes/Objects.php";
require_once "../classes/Department.php";
require_once "../classes/Objects.php";
$objects = Objects::getObjects($pdo);
$departments = Department::getDepartments($pdo);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создать пользователя</title>
</head>
<body>
    <form action="add.php" method="post">
        <input name="username" placeholder="Введите ваше имя"><br>
        <input name="surname" placeholder="Введите фамилию"><br>
        <label>Предмет:<br><select multiple name="value[]">
            <?php
                foreach($objects as $object): ?>
            <option value="<?=$object->getId();?>"><?=$object->getTitle();?></option>
            <?php endforeach;?>
            </select></label><br>
        <label>Кафедра:<br><select name="department">
            <?php foreach ($departments as $department): ?>
            <option value="<?=$department->getId();?>"><?=$department->getTitle();?></option>
            <?php endforeach;?>
        </select></label><br>
        <input name="email" placeholder="Эмеил"><br>
        <button>Отправить</button>
    </form>
</body>
</html>
