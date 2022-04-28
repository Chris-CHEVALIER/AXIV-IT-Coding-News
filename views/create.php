<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/main.css">
    <title>Coding News</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Coding News</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Tous les articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Rédiger un article</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    function loadClass(string $class)
    {
        require "../$class.php";
    }
    spl_autoload_register("loadClass");

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>