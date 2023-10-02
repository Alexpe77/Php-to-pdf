<?php

$storagePath = __DIR__ . '/storage/';

if(isset($_GET['file'])){
    $pdfFileName = basename($_POST['file']);
    $pdfFilePath = $storagePath. $pdfFileName;

    if(file_exists($pdfFilePath)){
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $pdfFileName . '"');
        readfile($pdfFilePath);
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid request.";
}