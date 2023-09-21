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
        
        require_once 'fpdf.php';

        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'New contract', 0, 1);
        $pdf->Cell(40, 10, 'Contractor\'s name : ' . $name, 0, 1);
        $pdf->Cell(40, 10, 'Contractor\'s email : ' . $email, 0, 1);
        $pdf->Cell(40, 10, 'Contractor\'s phone : ' . $phone, 0, 1);
        $pdf->Cell(40, 10, 'Contractor\'s address : ' . $address, 0,1);

        $pdf->Output('contract.pdf', 'D');
    }
}
