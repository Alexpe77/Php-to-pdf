<?php

require_once 'load_env.php';

class DatabaseManager {
    private $db;

    public function __construct() {
        $db_host = getenv('DB_HOST');
        $db_name = getenv('DB_NAME');
        $db_user = getenv('DB_USER');
        $db_pwd = getenv('DB_PWD');

        try {
            $this->db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pwd);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection error : " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->db;
    }
}
