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
        
        $storagePath = __DIR__ . '/storage/';
        $pdfFileName = $name . "_lease_agreement.pdf";

        require 'fpdf.php';

        $pdf = new FPDF('P', 'mm');
        $pdf->AddPage();
        $pdf->SetTopMargin(10);

        // Underlined and bold title then back to normal
        $pdf->SetFont('Arial', 'BU', 16);
        $pdf->Cell(40, 10, 'Lease Agreement', 40, 10);
        $pdf->SetFont('Arial', '', 10);
       
        $topTxt = 'The following model was established by the Walloon Government in execution of article 3, § 4, of the decree of March 15 2018 relating to residential lease. This is an indicative model and therefore not obligatory. In order to help the parties and in order to be complete, it includes not only the clauses from the decree, but also other well-known provisions of practice, which concern non-regulated subjects.';
        $pdf->MultiCell(0, 10, $topTxt);

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(40, 10, 'Tenant Informations', 40, 10);
        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(40, 10, 'Name : ' . $name, 40, 10);
        $pdf->Cell(40, 10, 'Current adress : ' . $address, 40, 10);
        $pdf->Cell(40, 10, 'Email address : ' . $email, 40, 10);
        $pdf->Cell(40, 10, 'Phone number : ' . $phone, 40, 10);

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(40, 10, 'Owner Informations', 40, 10);
        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(40, 10, 'Name : Bruce Springsteen', 40, 10);
        $pdf->Cell(40, 10, 'Address of the property : 89, Avenue Francois Mitterrand 62930 Wimereux', 40, 10);
        $pdf->Cell(40, 10, 'Email : bruce.s@gmail.com', 40, 10);
        $pdf->Cell(40, 10, 'Phone number : 0475 / 15 45 89', 40, 10);

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(40, 10, 'Agreement Terms', 40, 10);
        $pdf->SetFont('Arial', '', 10);

        $mainTxt = 'The lease will end upon notice of termination by one or other of the parties at least three months in advance. The parties may extend the short-term lease by mutual agreement under the same conditions, including the rent without prejudice to indexation. This extension must be made in writing. The lease can be extended twice provided that the successive contracts do not have a cumulative duration of more than three years. Except in the cases referred to in the preceding paragraph, in the absence of leave notified within the time limit or if, despite the leave given by the lessor, the lessee continues to occupy the premises without opposition from the lessor, and even in the event that a new contract is concluded between the same parties, the lease is deemed concluded for a period of nine year from the date on which the initial short-term lease came into force. In this case, the rent and other conditions remain unchanged from those agreed in the initial lease, subject to indexation and reasons for revision.';
        $pdf->MultiCell(0, 10, $mainTxt);

        $pdf->AddPage();

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(40, 10, 'Inventory of fixtures', 40, 10);
        $pdf->SetFont('Arial', '', 10);

        $inventoryTxt = 'The parties jointly draw up a detailed inventory at joint expense. This state of affairs is drawn up, either during the period when the premises are unoccupied, or during the first month of occupation. He is annexed to this lease and is also subject to registration. If a detailed inventory has not been made, the lessee will be presumed, at the end of the lease, to have received the leased property within the same state as that in which it is at the end of the lease unless proof to the contrary which can be provided by any means by right. The lessee must, at the end of the lease, return the rented property as he received it according to the inventory, if it has been drawn up, except what has perished or been damaged by obsolescence or force majeure. Each party may request the establishment of a contradictory exit inventory at shared costs.';
        $pdf->MultiCell(0, 10, $inventoryTxt);

        // Bold title then back to normal
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Signatures', 40, 10);
        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(90, 10, 'The Owner,');
        $pdf->SetX(110);
        $pdf->Cell(90, 10, 'The Tenant,');

        $pdfContent = $pdf->Output('', 'S');

        $pdfFilePath = $storagePath . '/' . $pdfFileName;

        file_put_contents($pdfFilePath, $pdfContent);

        session_start();
        $_SESSION['pdfFileName'] = $pdfFileName;

        header('Location: view/success.php');
        exit();
        }
    }
?>