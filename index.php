<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/main.css">
    <title>Coding News</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Coding News</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Tous les articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./views/create.php">Rédiger un article</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php

    function loadClass(string $class)
    {
        require "./$class.php";
    }
    spl_autoload_register("loadClass");

    $articleController = new ArticleController();
    $articles = $articleController->getAll();

    /* $articleData = [
        "id" => 1,
        "title" => "Bienvenue sur le second live AXIV IT Group",
        "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
        "imageurl" => "https://i.ytimg.com/vi/2nP4ya4FVO0/maxresdefault.jpg",
        "author" => "Chris Chevalier"
    ]; */

    // $article = new Article($articleData);

    // $title = "Mon super article";
    ?>

    <div class="container">
        <div class="d-flex justify-content-center">
            <img src="./images/logo.png" alt="Logo" class="logo mt-3">
        </div>

        <main class="d-flex justify-content-center flex-wrap">
            <?php
            foreach ($articles as $article) : ?>
                <div class="card m-3" style="width: 18rem;">
                    <img src="<?= $article->getImageurl() ?>" class="card-img-top" alt="<?= $article->getTitle() ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article->getTitle() ?></h5>
                        <p class="card-text"><?= $article->getContent() ?></p>
                        <footer class="blockquote-footer">Écrit par <?= $article->getAuthor() ?></footer>
                        <a href="#" class="btn btn-info">Lire</a>
                        <a href="#" class="btn btn-warning">Modifier</a>
                        <a href="#" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            <?php endforeach ?>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>