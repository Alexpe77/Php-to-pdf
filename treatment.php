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

        $pdf = new FPDF('P', 'mm');
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        // Underlined title then back to normal
        $pdf->SetFont('Arial', 'U', 12);
        $pdf->Cell(40, 10, 'Lease Agreement', 40, 10);
        $pdf->SetFont('Arial', '', 12);

        $topTxt = 'The following model was established by the Walloon Government in execution of article 3, § 4, of the decree of March 15
        2018 relating to residential lease. This is an indicative model and therefore not obligatory. In order to help the
        parties and in order to be complete, it includes not only the clauses from the decree, but also other
        well-known provisions of practice, which concern non-regulated subjects.';
        $pdf->MultiCell(0, 10, $topTxt);

        $pdf->SetFont('Arial', 'U', 12);
        $pdf->Cell(40, 10, 'Tenant Informations', 40, 10);
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(40, 10, 'Name : ' . $name, 40, 10);
        $pdf->Cell(40, 10, 'Current adress : ' . $address, 40, 10);
        $pdf->Cell(40, 10, 'Email address : ' . $email, 40, 10);
        $pdf->Cell(40, 10, 'Phone number : ' . $phone, 40, 10);

        $pdf->SetFont('Arial', 'U', 12);
        $pdf->Cell(40, 10, 'Owner Informations', 40, 10);
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(40, 10, 'Name : Bruce Springsteen', 40, 10);
        $pdf->Cell(40, 10, 'Address of the property : 89, Avenue François Mitterrand 62930 Wimereux', 40, 10);
        $pdf->Cell(40, 10, 'Email : bruce.s@gmail.com', 40, 10);
        $pdf->Cell(40, 10, 'Phone number : 0475 / 15 45 89', 40, 10);

        $pdf->SetFont('Arial', 'U', 12);
        $pdf->Cell(40, 10, 'Agreement Terms', 40, 10);
        $pdf->SetFont('Arial', '', 12);

        $mainTxt = 'The lease will end upon notice of termination by one or other of the parties at least three months in advance.
        The parties may extend the short-term lease by mutual agreement under the same conditions, including the
        rent without prejudice to indexation. This extension must be made in writing. The lease can be
        extended twice provided that the successive contracts do not have a cumulative duration of more than three years.
        Except in the cases referred to in the preceding paragraph, in the absence of leave notified within the time limit or if, despite the leave given
        by the lessor, the lessee continues to occupy the premises without opposition from the lessor, and even in the event that
        a new contract is concluded between the same parties, the lease is deemed concluded for a period of nine years
        from the date on which the initial short-term lease came into force. In this case, the rent and other
        conditions remain unchanged from those agreed in the initial lease, subject to indexation and
        reasons for revision.';
        $pdf->MultiCell(0, 10, $mainTxt);

        // Bold title then back to normal
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Signatures', 40, 10);
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(90, 10, 'The Owner');
        $pdf->SetX(110);
        $pdf->Cell(90, 10, 'The Tenant');
        $pdf->Output('lease_agreement.pdf', 'D');

        }
    }
?>