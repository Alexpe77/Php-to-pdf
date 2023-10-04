<?php

session_start();

if(isset($_SESSION['pdfFileName'])){
    $pdfFileName = $_SESSION['pdfFileName'];
    $storagePath = __DIR__ . '/storage';
    $pdfFilePath = $storagePath . '/' . $pdfFileName;

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
