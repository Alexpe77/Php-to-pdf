<?php

require_once 'validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $datas = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
    ];

    $formData = new Form($name, $email, $phone, $address);
    $errors = $formData->validateForm();

    if (empty($errors)) {
        
        require 'fpdf.php';

        $pdf = new FPDF('P', 'A4', 'en');
        $pdf->AddPage();
        $pdf->setFont('Arial', 12);
        
        include 'contract_model.php';
        
        $pdf->Output('lease_agreement.pdf', 'D');
        
        }
    }
?>