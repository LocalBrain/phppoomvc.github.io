<?php


class Database
{
    const DB_HOST = "localhost";
    const DB_NAME = "exercice";
    const DB_USER = "root";
    const DB_PASS = "root";
    private $_pdo;

    public function getPDO()
    {
        if ($this->_pdo === null) {
            $pdo = new PDO("mysql:host=" . $this->getHost() . ";dbname=" . $this->getName(), $this->getUser(), $this->getPass());
            $this->_pdo = $pdo;
        }
    }

    public function getHost()
    {
        return self::DB_HOST;
    }
    public function getName()
    {
        return self::DB_NAME;
    }
    public function getUser()
    {
        return self::DB_USER;
    }
    public function getPass()
    {
        return self::DB_PASS;
    }
}
