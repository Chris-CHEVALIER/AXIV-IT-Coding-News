<?php

class Comment
{
    // Attributs
    private $id;
    private $author;
    private $content;
    private $published_at;
    private $article_id;

    // Méthodes
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = "set" . ucfirst($key); // setId, setAuthor, setContent, setPublished_at, setArticle_id
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getPublished_at(): string
    {
        return $this->published_at;
    }

    public function setPublished_at(string $published_at): self
    {
        $this->published_at = $published_at;
        return $this;
    }

    public function getArticle_id(): int
    {
        return $this->article_id;
    }

    public function setArticle_id(int $article_id): self
    {
        $this->article_id = $article_id;
        return $this;
    }
}
