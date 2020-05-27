<?php


class Objects
{
    protected $id;
    protected $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    //получает предметы
    static public function getObjects(PDO $pdo){
        try{
            $sql = 'SELECT id,title FROM objects ORDER BY id';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $objects = $statement->fetchAll();
            $objCat = [];
                foreach($objects as $object){
                    $obj = new self($object['title']);
                    $obj->setId($object['id']);
                    $objCat[] = $obj;
                }
            return $objCat;
        }catch (Exception $exception){
            echo 'Error to show objects' . $exception->getMessage() . $exception->getCode();
            die();
        }
    }

    //запись в связующую таблицу
    static public function writeObjectsToRelation(PDO $pdo, $teacherId,$objectId){
        try{
            $sql = 'INSERT INTO relation SET
                id_teachers = :teacherId,
                id_objects = :objectId';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':teacherId',$teacherId);
            $statement->bindValue(':objectId',$objectId);
            $statement->execute();
        }catch (Exception $exception){
            echo 'Error write to relation'.$exception->getCode().$exception->getCode();
            die();
        }
    }

    //удаление по айди
    static public function deleteFromObjects(PDO $pdo, $id){
        try{
            $sql = 'DELETE FROM objects WHERE id = :id';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':id',$id);
            $statement->execute();
        }catch (Exception $exception){
            echo 'Error delete from objects'.$exception->getCode().$exception->getCode();
            die();
        }
    }

    //создает запись в таблице предметов
    static public function writeToObjects(PDO $pdo, $title){
        try {
            $sql = 'INSERT INTO objects SET
                title = :title';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':title', $title);
            $statement->execute();
        }catch (Exception $exception){
            echo 'Error write to objects'.$exception->getCode().$exception->getCode();
            die();
        }
    }

    //редактирует запись в таблице предметов
    static public function updateObject(PDO $pdo, $title, $id){
        try{
            $sql = 'UPDATE objects SET 
                    title = :title
                    WHERE id = :id';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':title',$title);
            $statement->bindValue(':id',$id);
            $statement->execute();
        }catch (Exception $exception){
            echo 'Error update objects'.$exception->getCode().$exception->getCode();
            die();
        }
    }

}