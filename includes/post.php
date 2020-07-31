<?php

class post extends model {

    public $content;
    public $title;

    public function addPost(){
        $sql = "INSERT INTO post(content, title) VALUES('" . $this->content . "', '" . $this->title . "')";
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

    public function editPost($postID){
        $sql = "UPDATE post SET title='" . $this->title . "', content='" . $this->content . "' WHERE ID=" . $postID;
        $this->database->query($sql);
    }
}
?>