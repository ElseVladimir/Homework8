<?php


class TableCreate
{
    static public function departments_create(PDO $pdo){
        try{
            $sql = 'CREATE TABLE IF NOT EXISTS departments(
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                tel_number INT(20) NOT NULL
            )DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
            $pdo->exec($sql);
        }catch (Exception $exception){
            echo 'Error creating departments' . $exception->getMessage() . $exception->getCode();
            die();
        }
    }

    static public function teacher_create(PDO $pdo){
        try{
            $sql = 'CREATE TABLE IF NOT EXISTS teachers(
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(50) NOT NULL,
                surname VARCHAR(70) NOT NULL,
                email VARCHAR(100) NOT NULL,
                dep_id INT NOT NULL,
                FOREIGN KEY (dep_id) REFERENCES departments (id) ON DELETE CASCADE
            )DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
            $pdo->exec($sql);
        }catch (Exception $exception){
            echo 'Error creating teachers' . $exception->getMessage() . $exception->getCode();
            die();
        }
    }

    static public function objects_create(PDO $pdo){
        try{
            $sql = 'CREATE TABLE IF NOT EXISTS objects(
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL
            )DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
            $pdo->exec($sql);
        }catch (Exception $exception){
            echo 'Error creating objects' . $exception->getMessage() . $exception->getCode();
            die();
        }
    }

    static public function relations(PDO $pdo){
        try{
            $sql = 'CREATE TABLE IF NOT EXISTS relation(
                id_teachers INT NOT NULL,
                id_objects INT NOT NULL,
                FOREIGN KEY (id_teachers) REFERENCES teachers (id) ON DELETE CASCADE,
                FOREIGN KEY (id_objects) REFERENCES objects (id) ON DELETE CASCADE         
            )DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
            $pdo->exec($sql);
        }catch (Exception $exception){
            echo 'Error creating departments' . $exception->getMessage() . $exception->getCode();
            die();
        }
    }



}