<?php
class App {
    private static $instance = null;
    private $pdo;

    private $dbhost = 'localhost';
    private $dbuser = 'slum';
    private $dbpass = '5SbtycTh4R7a3nQp';
    private $dbname = 'slum';

    public function renderHeader() {
        if (isset($_SESSION['username'])) {
            include_once('html/header.html');
        }
        else {
            include_once('html/header.html');
        }
    }

    public function renderFooter() {
        if (isset($_SESSION['username'])) {
            include_once('html/footer.html');
        }
        else {
            include_once('html/footer.html');
        }
    }



    private function __construct()
    {
        $this->pdo = new PDO("mysql:host={$this->dbhost}; dbname={$this->dbname}", $this->dbuser,$this->dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function __clone() {
    }

    function __wakeup() {
        throw new Exception('Serialization not supported.');
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new App();
        }

        return self::$instance;
    }

    public function getConn()
    {
        return $this->pdo;
    }




    public function getPosts($inId=null) {
        if (!empty($inId)) {
            $stmt = $this->pdo->query("SELECT * FROM text WHERE id = " . $inId . " ORDER BY id DESC");
        }
        else {
            $stmt = $this->pdo->query("SELECT * FROM text ORDER BY id DESC");
        }

        $postArray = array();
        while ($row = $stmt->fetch())
        {
            $myPost = new Post($row['id'], $row['title'], $row['body'], $row['author'], $row['post_date']);
            array_push($postArray, $myPost);
        }
        return $postArray;
    }

    public function renderPosts() {
        $posts = $this->getPosts();

        foreach ($posts as $post) {
            echo $post->title . "<br>";
            echo $post->author . "<br>";
            echo $post->body . "<br>";
            echo $post->post_date . "<br>";
            echo $post->post_time . "<br>";
            echo "<hr>";
        }
    }
}
