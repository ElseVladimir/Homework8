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

}