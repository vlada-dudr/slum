<?php
class DB {
  private static $instance = null;
  private $conn;
  
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '(%FBBxE5';
  private $name = 'slum'; 

  private function __construct()
  {
    $this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->name}", $this->user,$this->pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
  }
  
  public static function getInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new DB();
    }
   
    return self::$instance;
  }

  public function getRow($query) {
      $stmt = $this->conn->query($query);
      while($row = $stmt->fetch()) {
          return $row;
      }
  }

  public function getConn()
  {
    return $this->conn;
  }
}
