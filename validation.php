<?php

class Form {

    private $name;
    private $email;
    private $phone;
    private $address;

    public function __construct($name, $email, $phone, $address)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function validateForm() {

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

        $this->address = strip_tags(trim($this->address));
        if(empty($this->address)) {
            $errors['address'] = "Address is required.";
        } elseif (strlen($this->address) < 5) {
            $errors['address'] = "Address must contain at least five characters.";
        }

        return $errors;
    }
}
?>