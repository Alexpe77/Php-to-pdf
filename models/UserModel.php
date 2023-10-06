<?php

require_once '../config/connect.php';

class UserModel {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function createUser($name, $username, $email, $pwd){

       $hPwd = password_hash($pwd, PASSWORD_BCRYPT);

       $pdo = $this->db->getConnection();

       $stmt = $pdo->prepare("INSERT INTO user (name, username, email, password
       VALUES (:name, :username, :email, :password)");

       $stmt->bindParam(':name', $name, PDO::PARAM_STR);
       $stmt->bindParam(':username', $username, PDO::PARAM_STR);
       $stmt->bindParam(':email', $email, PDO::PARAM_STR);
       $stmt->bindParam(':password', $hPwd, PDO::PARAM_STR);

       if ($stmt->execute()) {
        return true;
       } else {
        return false;
       }
    }


}