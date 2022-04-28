<?php

class Article
{
    // Attributs 
    private $id;
    private $title;
    private $content;
    private $imageurl;
    private $author;
    private $created_at;

    // Méthodes
    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        /* if ($donnees["id"]) {
            $this->setId($donnees["id"]);
        }
        if ($donnees["title"]) {
            $this->setTitle($donnees["title"]);
        }
        if ($donnees["content"]) {
            $this->setContent($donnees["content"]);
        }
        if ($donnees["imageUrl"]) {
            $this->setImageUrl($donnees["imageUrl"]);
        }
        if ($donnees["author"]) {
            $this->setAuthor($donnees["author"]);
        } */
        foreach ($donnees as $key => $value) {
            $method = "set" . ucfirst($key); // setId, setTitle, setContent, setImageurl, setAuthor
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId() // Getter
    {
        return $this->id;
    }

    public function setId(int $id) // Setter
    {
        if ($id > 0) {
            $this->id = $id;
            return $this;
        }
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }

    public function getImageurl()
    {
        return $this->imageurl;
    }

    public function setImageurl($imageurl)
    {
        $this->imageurl = $imageurl;
        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }
}
