<?php

class Form {

    private $name;
    private $email;
    private $phone;
    private $adress;

    public function __construct($name, $email, $phone, $adress)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->adress = $adress;
    }

    public function validate() {

        $errors = [];

        $this->name = strip_tags(trim($this->name));
        if(empty($this->name)) {
            $errors['name'] = "Full name is required.";
        } elseif (strlen($this->name) < 3) {
            $errors['name'] = "Full name must contain at least three characters.";
        }

        $this->email = trim($this->email);
        if(empty($this->email)) {
            $errors['email'] = "Email is required.";
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "The email adress you entered is not valid.";
        }

        $this->phone = trim($this->phone);
        if(empty($this->phone)) {
            $errors['phone'] = "Phone number is required";
        } elseif (!preg_match('/^\d{10}$/', $this->phone)) {
            $errors['phone'] = "Phone number must contain ten figures.";
        }

        $this->adress = strip_tags(trim($this->adress));
        if(empty($this->adress)) {
            $errors['adress'] = "Adress is required.";
        } elseif (strlen($this->adress) < 5) {
            $errors['adress'] = "Adress must contain at least five characters.";
        }

        return $errors;
    }
}
?>