<?php

class post extends model {

    public $content;
    public $title;
    public $prueba;

    public function addPost(){
        $sql = "INSERT INTO post(content, title) VALUES('" . $this->content . "', '" . $this->titulo . "')";
        $this->database->query($sql);
    }

    public function renderPosts($posts) {
        foreach ($posts as $post) {
            echo '<li><a href="/blog/post.php?id=' . $post['ID'] . '">' . $post["title"] . '</a></li>';
        }
    }

    public function renderPost($post) {
        echo '<h2>' . $post->title . '</h2>';
        echo '<p>' . $post->content . '</p>';
    }
}
?>