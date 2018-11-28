<?php

class App
{
    private static $instance = null;
    private $pdo;

    private $dbhost = 'localhost';
    private $dbuser = 'slum';
    private $dbpass = '5SbtycTh4R7a3nQp';
    private $dbname = 'slum';
    protected $query;

    public function renderHeader()
    {
        if (isset($_SESSION['username'])) {
            include_once 'html/header.html';
        } else {
            include_once 'html/header.html';
        }
    }

    public function renderFooter()
    {
        if (isset($_SESSION['username'])) {
            include_once 'html/footer.html';
        } else {
            include_once 'html/footer.html';
        }
    }

    private function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host={$this->dbhost}; dbname={$this->dbname}", $this->dbuser, $this->dbpass, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
        } catch (\PDOException $e) {
            die('Je to rozbitý');
        }
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new Exception('Serialization not supported.');
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new App();
        }

        return self::$instance;
    }

    public function getConn()
    {
        return $this->pdo;
    }

    public function getPostById($inId)
    {
        $stmt = $this->pdo->query('SELECT * FROM text WHERE id = '.$inId.' ORDER BY id DESC');
        $row  = $stmt->fetch();

        return new Post($row['id'], $row['title'], $row['body'], $row['author'], $row['post_date']);
    }

    protected function route()  {

        return $renderable;
    }

    public function run() {
        $view = $this->route()
        ob_start();
        $this->renderHeader();
        $view->render();
        $this->renderFooter();
        ob_end_flush();
    }

    /*
    public function getPosts($limit) {
      $stmt = $this->pdo->query("SELECT * FROM text LIMIT " . $limit);
      $postArray = array();
      while ($row = $stmt->fetch())
      {
          $post = new Post($row['id'], $row['title'], $row['body'], $row['author'], $row['post_date']);
          array_push($postArray, $post);
      }
      return $postArray;
    }

    public function renderPosts() {
        $posts = $this->getPosts(2);

        echo "<div class=\"posts\">";

        foreach ($posts as $post) {
          echo "<div class=\"post\">" .
          "<h2 class=\"post__title\">" . $post->title . "</h2>" .
          "<p class=\"post__author\">" . $post->author . "</p>" .
          "<p class=\"post__body\">" . $post->body . "</p>" .
          "<p class=\"post__date\">" . $post->post_date . "</p>" .
          "<p class=\"post__time\">" . $post->post_time . "</p>" .
          "</div>";
        }
        echo "</div>";
    }
    */
}
