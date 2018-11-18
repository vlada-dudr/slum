<?php

require_once("../Autoloader.php");
spl_autoload_register('Autoloader::ClassLoader');


class Post {
    public $id;
    public $title;
    public $body;
    public $author;
    public $post_date;
    public $post_time;

    public function __construct($inId=null, $inTitle=null, $inBody=null, $inAuthor=null, $inPost_date=null) {
        $app = App::getInstance();
        $db = $app->getConn();

        if (!empty($inId)) {
            $this->id = $inId;
        }
        if (!empty($inTitle)) {
            $this->title = $inTitle;
        }
        if (!empty($inBody)) {
            $this->body = nl2br($inBody);
        }

        if (!empty($inPost_date)) {
          $this->post_date = date('j. n. Y',strtotime($inPost_date));
          $this->post_time = date('H:i',strtotime($inPost_date));
        }

        if (!empty($inAuthor)) {
            $query = $db->query("SELECT firstname, lastname FROM users WHERE id = " . $inAuthor);
            $row = $query->fetch();
            $this->author = $row['firstname'] . " " . $row['lastname'];
        }
    }
}
