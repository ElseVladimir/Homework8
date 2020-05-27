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

}