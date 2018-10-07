
<?php

class DB {
        private $server;
        private $username;
        private $password;
        private $dbname;
        private $charset;

        public function connect() {
                $this->server = "localhost";
                $this->username = "root";
                $this->password = "(%FBBxE5";
                $this->dbname = "slum";
                $this->charset = "utf8mb4";
                try {
                        $dsn = "mysql:host=" . $this->server . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
                        $pdo = new PDO($dsn, $this->username, $this->password);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        return $pdo;
                }
                catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                }
        }
}
