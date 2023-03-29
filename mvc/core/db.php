<?php

class db{

    public $conn;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "cnw_ct275";

    function __construct(){
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->dbname);
        // hỗ trợ tiếng việt trong my sql
        mysqli_query($this->conn, "SET NAMES 'utf8'");
    }

}

?>