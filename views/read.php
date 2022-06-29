<?php require_once "../layout/header.php";

$articleController = new ArticleController();
$article = $articleController->get($_GET["id"]);
?>

<div class="card m-3">
    <img src="<?= $article->getImageurl() ?>" class="card-img-top" alt="<?= $article->getTitle() ?>">
    <div class="card-body">
        <h5 class="card-title"><?= $article->getTitle() ?></h5>
        <p class="card-text"><?= $article->getContent() ?></p>
        <footer class="blockquote-footer">Écrit par <?= $article->getAuthor() ?></footer>
        <a href="../views/edit.php?id=<?= $article->getId() ?>" class="btn btn-warning"><i class="bi bi-pen"></i></a>
        <a href="../views/delete.php?id=<?= $article->getId() ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
    </div>
</div>

<?php require_once "../layout/footer.php"; ?>