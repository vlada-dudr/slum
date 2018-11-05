<?php
class App {
    private static $instance = null;
    private $pdo;

    private $dbhost = 'localhost';
    private $dbuser = 'slum';
    private $dbpass = '5SbtycTh4R7a3nQp';
    private $dbname = 'slum';

    /*
    private function renderHeader() {
        if (isset($_SESSION["username"])) {
            echo "";
        }
        else {
            echo "";
        }
    }
    */

    private function __construct()
    {
        $this->pdo = new PDO("mysql:host={$this->dbhost}; dbname={$this->dbname}", $this->dbuser,$this->dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function __clone() {
    }

    function __wakeup() {
        throw new Exception("Serialization not supported.");
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
}

