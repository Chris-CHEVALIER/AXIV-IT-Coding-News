<?php require_once "../layout/header.php";

$articleController = new ArticleController();
$article = $articleController->get($_GET["id"]);

if ($_POST) {
    $article->hydrate($_POST);
    $articleController->update($article);
}

?>

<div class="container">
    <h3>Modifier l'article <?= $article->getTitle() ?></h3>
    <form method="POST">
        <label for="title" class="form-label">Titre</label>
        <input type="text" value="<?= $article->getTitle() ?>" minlength="4" maxlength="80" required name="title" id="title" class="form-control" placeholder="Le titre de l'article">
        <label for="content" class="form-label">Contenu</label>
        <textarea minlength="10" maxlength="800" type="text" required placeholder="Le contenu de l'article" rows="6" name="content" id="content" class="form-control"><?= $article->getContent() ?></textarea>
        <label for="author" class="form-label">Auteur</label>
        <input type="text" value="<?= $article->getAuthor() ?>" minlength="3" maxlength="60" required name="author" id="author" class="form-control" placeholder="L'auteur de l'article">
        <label for="imageurl" class="form-label">URL de l'image</label>
        <input type="url" value="<?= $article->getImageurl() ?>" minlength="10" name="imageurl" id="imageurl" class="form-control" placeholder="L'URL de l'image">
        <input type="submit" value="Publier" class="btn btn-success mt-2">
    </form>
</div>


<?php require_once "../layout/footer.php"; ?>