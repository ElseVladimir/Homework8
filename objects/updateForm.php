<?php
require_once "../config/connect_db.php";
require_once "../classes/Teachers.php";
require_once "../classes/Objects.php";
require_once "../classes/Department.php";

$id = htmlspecialchars($_GET['id']);

if(empty($_GET['id'])){
    die('404');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма редактирования предмета</title>
</head>
<body>
<h1>Редактировать предмет</h1>
    <form method="post" action="update.php">
        <input name="title" placeholder="Новое название">
        <input type="hidden" name="id" value="<?=$id;?>">
        <button>Отправить</button>
    </form>

</body>
</html>
