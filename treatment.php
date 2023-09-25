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
        
        require 'node_modules/html2pdf.js/dist/html2pdf.bundle.min.js';

        $html2pdf = new HTML2PDF('P', 'A4', 'en');
        $html2pdf->setDefaultFont('Arial', 12);
        
        ob_start();
        include 'contract_model.php';
        $html = ob_get_clean();

        $html2pdf->writeHTML($html);
        
        $html2pdf->output('lease_agreement.pdf');

        }
    }
?>