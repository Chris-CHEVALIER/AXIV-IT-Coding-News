<?php

class CommentController
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

    public function create(Comment $comment)
    {
        $req = $this->pdo->prepare("INSERT INTO `comment` (author, content, published_at, article_id) VALUES (:author, :content, NOW(), :article_id)");

        $req->bindValue(":author", $comment->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);
        $req->bindValue(":article_id", $comment->getArticle_id(), PDO::PARAM_INT);

        $req->execute();
    }

    public function update(Comment $comment)
    {
        $req = $this->pdo->prepare("UPDATE `comment` SET content = :content, article_id = :article_id, author = :author, published_at = NOW() WHERE id = :id");

        $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);
        $req->bindValue(":article_id", $comment->getArticle_id(), PDO::PARAM_INT);
        $req->bindValue(":author", $comment->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(":id", $comment->getId(), PDO::PARAM_INT);

        $req->execute();
    }

    public function delete(int $id)
    {
        $req = $this->pdo->prepare("DELETE FROM `comment` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function get(int $id)
    {
        $req = $this->pdo->prepare("SELECT * FROM `comment` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $comment = new Comment($data);
        return $comment;
    }

    public function getAll()
    {
        $allComments = [];
        $comments = $this->pdo->query("SELECT * FROM `comment`");
        foreach ($comments as $comment) {
            $allComments[] = new Comment($comment);
        }
        return $allComments;
    }
}
