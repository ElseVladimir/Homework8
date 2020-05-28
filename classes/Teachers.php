<?php


class Teachers
{
    protected $id;
    protected $name;
    protected $surname;
    protected $email;
    protected $departmentId;

    public function __construct($name, $surname, $email,$departmentId)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->email = $departmentId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;
    }



    static public function writeTeacher(PDO $pdo,$name,$surname,$email,$departmentId)
    {
        try {
            $sql = 'INSERT INTO teachers SET
            name = :name,
            surname = :surname,
            email = :email,
            dep_id = :departmentId';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':surname', $surname);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':departmentId', $departmentId);
            $statement->execute();
        } catch (Exception $exception) {
            echo 'Error write to teacher' . $exception->getCode() . ' ' . $exception->getMessage();
            die();
        }
    }

    static public function getTeachers(PDO $pdo)
    {
        try {
            $sql = 'SELECT * FROM teachers ORDER BY id DESC';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $teachers = $statement->fetchAll();
            $teachArr = [];
            foreach ($teachers as $teacher) {
                $teach = new self($teacher['name'], $teacher['surname'], $teacher['email'], $teacher['dep_id']);
                $teach->setId($teacher['id']);
                $teachArr[] = $teach;
            }
            return $teachArr;
        } catch (Exception $exception) {
            echo 'Error read teachers' . $exception->getCode() . ' ' . $exception->getMessage();
            die();
        }
    }

    //делает выборку последней записи, дублирует код :((((
    static public function getLastId(PDO $pdo){
        try {
            $sql = 'SELECT * FROM teachers ORDER BY id DESC LIMIT 1';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $teachers = $statement->fetchAll();
            $teachArr = [];
            foreach ($teachers as $teacher) {
                $teach = new self($teacher['name'], $teacher['surname'], $teacher['email'], $teacher['dep_id']);
                $teach->setId($teacher['id']);
                $teachArr[] = $teach;
            }
            return $teachArr;
        }catch (Exception $exception){
            echo 'Error read teachers' . $exception->getCode() . ' ' . $exception->getMessage();
            die();
        }
    }

    //показывает какой преподаватель на какой кафедре
    static public function getDepartmentsToTeachers(PDO $pdo){
        try{
            $sql = 'SELECT t.name,t.surname,t.dep_id,dep.id,dep.title as depName FROM teachers AS t
                    INNER JOIN departments AS dep ON t.dep_id = dep.id';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $all = $statement->fetchAll();
            return $all;
        }catch (Exception $exception){
            die('error read from db'.$exception->getCode().$exception->getMessage());
        }
    }
}