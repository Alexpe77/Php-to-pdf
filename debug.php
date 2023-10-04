<?php
session_start();
if (isset($_SESSION['pdfFileName'])) {
    $pdfFileName = $_SESSION['pdfFileName'];
    echo "PDF FileName: $pdfFileName<br>";
} else {
    echo "Errors: " . print_r($errors, true);
}
