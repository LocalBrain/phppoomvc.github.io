<?php

require_once "Database.php";

class User
{
    private $_connect;
    public function __construct($connect)
    {
        $this->connect = new Database();
    }

    public function afficherUser()
    {
        $sql = "SELECT * FROM users";
        $req = $this->_connect->getPDO()->query($sql);
        $req->execute();
    }
    public function ajouterUser($pseudo, $mail, $password)
    {
        $sql = "INSERT INTO `users`(`pseudo`, `mail`, `password`) VALUES (:pseudo, :mail, :password)";
        $req = $this->_connect->getPDO()->prepare($sql);
        $req->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $req->bindValue(":mail", $mail, PDO::PARAM_STR);
        $req->bindValue(":password", $password, PDO::PARAM_STR);
        $req->execute();
    }
    public function supprimerUser($id)
    {
        $sql = "DELETE FROM `users` WHERE `id` = :id";
        $req = $this->_connect->getPDO()->prepare($sql);
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
    public function modifierUser($pseudo, $mail, $password)
    {
        $sql = "UPDATE `users` SET(`pseudo` = :pseudo, `mail` = :mail, `time` = :password)";
        $req = $this->_connect->getPDO()->prepare($sql);
        $req->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $req->bindValue(":mail", $mail, PDO::PARAM_STR);
        $req->bindValue(":password", $password, PDO::PARAM_STR);
        $req->execute();
    }
}
