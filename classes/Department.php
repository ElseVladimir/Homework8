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


}