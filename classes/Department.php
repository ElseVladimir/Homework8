<?php


class Department
{
    protected $id;
    protected $title;
    protected $telNumber;

    public function __construct($title, $telNumber)
    {
        $this->title = $title;
        $this->telNumber = $telNumber;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getTelNumber()
    {
        return $this->telNumber;
    }

    //получает записи
    static public function getDepartments(PDO $pdo){
        try{
            $sql = 'SELECT id,title,tel_number FROM departments ORDER BY id';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $departments = $statement->fetchAll();
            $dep = [];
            foreach($departments as $department){
                $depart = new self($department['title'],$department['tel_number']);
                $depart->setId($department['id']);
                $dep[] = $depart;
            }
            return $dep;
        }catch (Exception $exception){
            echo 'Error to show departments' . $exception->getMessage() . $exception->getCode();
            die();
        }
    }
    //удаляет по айди
    static public function deleteFromDepartments(PDO $pdo, $id){
        try{
            $sql = 'DELETE FROM departments WHERE id = :id';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':id', $id);
            $statement->execute();
        }catch (Exception $exception){
            echo 'error delete from departments' . $exception->getMessage() . $exception->getCode();
            die();
        }
    }

    //делает запись в department
    static public function writeToDepartments(PDO $pdo, $title,$telNumber){
        try{
            $sql = 'INSERT INTO departments SET 
                    title = :title,
                    tel_number = :telNumber';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':title',$title);
            $statement->bindValue(':telNumber',$telNumber);
            $statement->execute();
        }catch (Exception $exception){
            echo 'error write to departments'.$exception->getMessage().$exception->getCode();
            die();
        }
    }

    //редактирует запись
    static public function updateDepartments(PDO $pdo, $title, $telNumber, $id){
        try {
            $sql = 'UPDATE departments SET 
                title = :title,
                tel_number = :telNumber
                WHERE id = :id';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':telNumber', $telNumber);
            $statement->bindValue(':id', $id);
            $statement->execute();
        }catch (Exception $exception){
            echo 'error update departments'.$exception->getMessage().$exception->getCode();
            die();
        }
    }


}