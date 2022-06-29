<!DOCTYPE html>
<html lang="fr-FR">
<?php
$isIndex = str_contains($_SERVER["REQUEST_URI"], "index") ? true : false;
function loadClass(string $class)
{
    $isIndex = str_contains($_SERVER["REQUEST_URI"], "index") ? true : false;
    if (str_contains($class, "Controller")) {
        require $isIndex ? "./Controller/$class.php" : "../Controller/$class.php";
    } else {
        require $isIndex ? "./Entity/$class.php" : "../Entity/$class.php";
    }
}
spl_autoload_register("loadClass");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $isIndex ? "." : ".." ?>/styles/main.css">
    <title>Coding News</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= $isIndex ? "." : ".." ?>/index.php">Coding News</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= $isIndex ? "active" : "" ?>" href="<?= $isIndex ? "." : ".." ?>/index.php">Tous les articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $isIndex ? "" : "active" ?>" href="<?= $isIndex ? "." : ".." ?>/views/create.php">Rédiger un article</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>