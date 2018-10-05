<?php

class DB {
    protected $db_name = "slum";
    protected $db_user = "root";
    protected $db_pass = "";
    protected $db_host = "localhost";

    public function connect() {
        $conn = mysqli($this->db_host, $this->db_user, $this->db_pass);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        mysqli_select_db($this->db_name);
        echo "nice";

        return true;
    }

}