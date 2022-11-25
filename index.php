<?php
function autoload($class)
{
    require_once "src/controller/" . $class . ".php";
    require_once "src/model/" . $class . ".php";
}

spl_autoload_register("autoload");

use src\control\ControlPost;

$post = new ControlPost;

require_once "src/view/header.php";
require_once "src/view/nav.php";

if (isset($_GET["action"])) {
    if ($_GET["action"] === "home") {
        $post->afficherPostControl();
    } elseif ($_GET["action"] === "post") {
        $post->afficherPostControl();
    } elseif ($_GET["action"] === "post") {
        $post->afficherPostControl();
    } elseif ($_GET["action"] === "post") {
        $post->afficherPostControl();
    }
} else {
    $_GET["action"] === "home";
}

require_once "src/view/footer.php";
