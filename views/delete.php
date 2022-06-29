<?php

function loadClass(string $class)
{
    if (str_contains($class, "Controller")) {
        require "../Controller/$class.php";
    } else {
        require "../Entity/$class.php";
    }
}
spl_autoload_register("loadClass");

$articleController = new ArticleController();
$articleController->delete($_GET["id"]);

echo "<script>window.location.href='../index.php'</script>";
