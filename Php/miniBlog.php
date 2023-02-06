<?php

class Post {
    public $title;
    public $author;
    public $published;
    public $content;

    public function __construct($title, $author, $published, $content) {
        $this->title = $title;
        $this->author = $author;
        $this->published = $published;
        $this->content = $content;
    }
}

class Comment {
    public $author;
    public $content;

    public function __construct($author, $content) {
        $this->author = $author;
        $this->content = $content;
    }
}

$posts = [
    new Post("Mon premier article", "John Doe", true, "Contenu de mon premier article"),
    new Post("Mon deuxième article", "Jane Doe", true, "Contenu de mon deuxième article"),
    new Post("Mon troisième article", "Jim Doe", false, "Contenu de mon troisième article")
];

$comments = [
    new Comment("Jane", "Super article !"),
    new Comment("Jim", "J'ai adoré !"),
    new Comment("John", "Intéressant")
];

// Affichage des articles publiés avec leurs commentaires
foreach ($posts as $post) {
    if ($post->published) {
        echo "<h2>{$post->title}</h2>";
        echo "<p>Publié par {$post->author}</p>";
        echo "<p>{$post->content}</p>";

        // Affichage des commentaires associés à l'article
        echo "<h3>Commentaires</h3>";
        foreach ($comments as $comment) {
            echo "<p><strong>{$comment->author}</strong> a dit : {$comment->content}</p>";
        }
    }
}
