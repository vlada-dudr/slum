<?php

require_once '../Autoloader.php';
spl_autoload_register('Autoloader::ClassLoader');

class DbObject
{
    protected $mapping;
    protected $data;

    public function __construct($data)
    {
        foreach ($this->mapping as $column) {
            //check
        }
    }

    public function __get($param)
    {
        return $data[$param];
    }
}

class Post
{
    protected $mapping = [
        'id',
        'title',
        'body',
        'author_id',
    ];

    protected $author;

    public function getAuthor()
    {
        if (is_null($this->author)) {
            $query        = $db->query('SELECT firstname, lastname FROM users WHERE id = '.$inAuthor);
            $row          = $query->fetch();
            $this->author = $row['firstname'].' '.$row['lastname'];
        }

        return $this->author;
    }
}

class Post
{
    public $id;
    public $title;
    public $body;
    protected $author;
    public $author_id;
    public $post_date;
    public $post_time;

    public function __construct($inId = null, $inTitle = null, $inBody = null, $inAuthor = null, $inPost_date = null)
    {
        $app = App::getInstance();
        $db  = $app->getConn();

        if (!is_null($inId)) {
            $this->id = $inId;
        }
        if (!empty($inTitle)) {
            $this->title = $inTitle;
        }
        if (!empty($inBody)) {
            $this->body = nl2br($inBody);
        }

        if (!empty($inPost_date)) {
            $this->post_date = date('j. n. Y', strtotime($inPost_date));
            $this->post_time = date('H:i', strtotime($inPost_date));
        }

        if (!empty($inAuthor)) {
        }
    }
}
