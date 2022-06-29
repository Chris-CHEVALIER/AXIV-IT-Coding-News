<?php require_once "../layout/header.php";

if ($_POST) {
    $articleController = new ArticleController();
    $newArticle = new Article($_POST);
    $articleController->create($newArticle);
}

?>

<div class="container">
    <h3>Rédiger un article</h3>
    <form method="POST">
        <label for="title" class="form-label">Titre</label>
        <input type="text" minlength="4" maxlength="80" required name="title" id="title" class="form-control" placeholder="Le titre de l'article">
        <label for="content" class="form-label">Contenu</label>
        <textarea minlength="10" maxlength="800" type="text" required placeholder="Le contenu de l'article" rows="6" name="content" id="content" class="form-control"></textarea>
        <label for="author" class="form-label">Auteur</label>
        <input type="text" minlength="3" maxlength="60" required name="author" id="author" class="form-control" placeholder="L'auteur de l'article">
        <label for="imageurl" class="form-label">URL de l'image</label>
        <input type="url" minlength="10" name="imageurl" id="imageurl" class="form-control" placeholder="L'URL de l'image">
        <input type="submit" value="Publier" class="btn btn-success mt-2">
    </form>
</div>

<?php require_once "../layout/footer.php"; ?>