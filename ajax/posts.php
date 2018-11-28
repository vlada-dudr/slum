<?php

class posts
{
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function render()
    {
        $stmt  = $this->app->db->query('SELECT * FROM text LIMIT '.$postCount);
        $posts = [];
        while ($row = $stmt->fetch()) {
            $post = new Post($row['id'], $row['title'], $row['body'], $row['author'], $row['post_date']);
            array_push($posts, $post);
        }

        foreach ($posts as $post) {
            $post->render();
        }
    }
}
