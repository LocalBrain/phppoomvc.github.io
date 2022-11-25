<?php

namespace src\control;

require_once "../model/Post.php";

use src\model\Post as ModelPost;
use PDO;

class ControlPost
{
    public function afficherPostControl()
    {
        $model = new ModelPost();
        $model->afficherPost();
    }
    public function ajouterPostControl($name, $content, $date)
    {
        require_once "src/view/ajouter_article.php";
        session_start();
        if (isset($_SESSION["user"])) {
            $model = new ModelPost();
            $name = strip_tags($_SESSION["user"]["name"]);
            $content = strip_tags($_POST["content"]);
            $date = date("d M Y H:i:s");

            if (strlen($content) < 5) {
                echo "Votre message doit comporter 5 caractères minimum";
            } else {
                $model->ajouterPost($name, $content, $date);
            }
        } else {
            header("Location:?action=connexion");
        }
    }
    public function supprimerPostControl($id)
    {
        session_start();
        if (isset($_SESSION["user"])) {
            if ($_SESSION["user"]["id"] == $id) {
                $model = new ModelPost();
                $model->supprimerPost($id);
            }
        }
    }
    public function modifierPostControl($id, $content, $date)
    {
        session_start();
        if (isset($_SESSION["user"])) {
            if ($_SESSION["user"]["id"] == $id) {
                $id = $_SESSION["user"]["id"];
                $date = date("d M Y H:i:s");
                $model = new ModelPost();
                $model->modifierPost($id, $content, $date);
                header("Location:?action=article");
            }
        } else {
            header("Location:?action=connexion");
        }
    }
}
