<?php

require_once './Models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct($db) {

        $this->userModel = new UserModel($db);
    }

    public function signUp() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $pwd = $_POST['password'];

            $errors = [];

            if (empty($name)) {
                $errors[] = "Name required.";
            }
            if (empty($username)) {
                $errors[] = "Username required.";
            }
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email required.";
            }
            if (empty($pwd)) {
                $errors[] = "Password required.";
            }
        }
    }
}