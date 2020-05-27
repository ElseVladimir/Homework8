<?php


class Teachers
{
    protected $id;
    protected $name;
    protected $surname;
    protected $email;

    public function __construct($name, $surname, $email)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
    }

}