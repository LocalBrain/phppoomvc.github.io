<?php

namespace src\model;

use Database;
use PDO;

require_once "Database.php";

class Post
{
    private $_connect;
    public function __construct()
    {
        $this->connect = new Database();
    }

    public function afficherPost()
    {
        $sql = "SELECT * FROM post";
        $req = $this->_connect->getPDO()->query($sql);
        $req->execute();
        while ($list_article = $req->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="container_com">
                <div>
                    <h4><?= $list_article['name'] ?></h4>
                </div>
                <div>
                    <p><?= $list_article['content'] ?></p>
                </div>
                <div>
                    <p><?= $list_article['time'] ?></p>
                </div>
                <div>
                    <p><a href="?post=<?= $list_article['id']; ?>">Commenter</a></p>
                </div>
            </div>
<?php endwhile;
        $req->closeCursor();
    }
    public function ajouterPost($name, $content, $date)
    {
        $sql = "INSERT INTO `post`(`name`, `content`, `time`) VALUES (:name, :content, :date)";
        $req = $this->_connect->getPDO()->prepare($sql);
        $req->bindValue(":name", $name, PDO::PARAM_STR);
        $req->bindValue(":content", $content, PDO::PARAM_STR);
        $req->bindValue(":date", $date, PDO::PARAM_STR);
        $req->execute();
    }
    public function supprimerPost($id)
    {
        $sql = "DELETE FROM `post` WHERE `id` = :id";
        $req = $this->_connect->getPDO()->prepare($sql);
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
    public function modifierPost($id, $content, $date)
    {
        $sql = "UPDATE `post` SET(`content` = :content, `time` = :date) WHERE id = :id";
        $req = $this->_connect->getPDO()->prepare($sql);
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->bindValue(":content", $content, PDO::PARAM_STR);
        $req->bindValue(":date", $date, PDO::PARAM_STR);
        $req->execute();
    }
}
