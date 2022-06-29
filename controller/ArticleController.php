<?php

class ArticleController
{
    private $pdo; // Instance de l'objet PHP PDO (interface de connexion à la BDD)

    public function __construct()
    {
        $dbName = "axiv_live";
        $port = 3306;
        $userName = "root";
        $password = "root";
        try {
            $this->setPdo(new PDO("mysql:host=localhost;dbname=$dbName;port=$port", $userName, $password));
        } catch (PDOException $error) {
            echo "<p style='color: red'>$error</p>";
        }
    }

    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
        return $this;
    }

    public function create(Article $article)
    {
        $req = $this->pdo->prepare("INSERT INTO `article` (title, content, imageurl, author, created_at) VALUES (:title, :content, :imageurl, :author, NOW())");

        $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        $req->bindValue(":imageurl", $article->getImageurl(), PDO::PARAM_STR);
        $req->bindValue(":author", $article->getAuthor(), PDO::PARAM_STR);

        $req->execute();
    }

    public function update(Article $article)
    {
        $req = $this->pdo->prepare("UPDATE `article` SET title = :title, content = :content, imageurl = :imageurl, author = :author, created_at = NOW() WHERE id = :id");

        $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        $req->bindValue(":imageurl", $article->getImageurl(), PDO::PARAM_STR);
        $req->bindValue(":author", $article->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":id", $article->getId(), PDO::PARAM_INT);

        $req->execute();
    }

    public function delete(int $id)
    {
        $req = $this->pdo->prepare("DELETE FROM `article` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function get(int $id)
    {
        $req = $this->pdo->prepare("SELECT * FROM `article` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $article = new Article($data);
        return $article;
    }

    public function getAll()
    {
        $allArticles = [];
        $articles = $this->pdo->query("SELECT * FROM `article`");
        foreach ($articles as $article) {
            $allArticles[] = new Article($article);
        }
        return $allArticles;
    }

    /*
    [
        "id" => 1,
        "title" => "Bienvenue sur le second live AXIV IT Group",
        "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
        "imageurl" => "https://i.ytimg.com/vi/2nP4ya4FVO0/maxresdefault.jpg",
        "author" => "Chris Chevalier"
    ];
     */
}
