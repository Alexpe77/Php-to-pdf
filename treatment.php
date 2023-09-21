<?php

require_once 'validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];

    $datas = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'adress' => $adress,
    ];

    $formData = new Form($name, $email, $phone, $adress);
    $errors = $formData->validateForm();

    if (empty($errors)) {
        
        require_once 'fpdf.php';

        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'New contract', 0, 1);
        $pdf->Cell(40, 10, 'Contractor\'s name :' . $name);
        $pdf->Cell(40, 10, 'Contractor\'s email :' . $email);
        $pdf->Cell(40, 10, 'Contractor\'s phone :' . $phone);
        $pdf->Cell(40, 10, 'Contractor\'s adress :' . $adress);

        $pdf->Output('contract.pdf', 'D');

    header('Location: success.php');
        exit;
    }
}

// TODO Include errors the right way
