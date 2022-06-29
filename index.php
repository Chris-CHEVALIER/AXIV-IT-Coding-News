<?php require_once "./layout/header.php";

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
                    <a href="./views/read.php?id=<?= $article->getId() ?>" class="btn btn-info"><i class="bi bi-eye"></i></a>
                    <a href="./views/edit.php?id=<?= $article->getId() ?>" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                    <a href="./views/delete.php?id=<?= $article->getId() ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                </div>
            </div>
        <?php endforeach ?>
    </main>
</div>

<?php require_once "./layout/footer.php"; ?>