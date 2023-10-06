<?php

$pdfFileName = '';

if (isset($_GET['file'])) {
    $pdfFileName = basename($_GET['file']);
    $pdfFilePath = 'storage/' . $pdfFileName;

    if (file_exists($pdfFilePath)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="lease_agreement"');
        readfile($pdfFilePath);
        exit();
    }
} else {
    echo "Invalid request : No file specified for download.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../startbootstrap/css/styles.css" type="text/css" rel="stylesheet" />
    <title>Success</title>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand">PDF Maker</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../home">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead d-flex h-100">
        <div class="container px-4 px-lg-5 h-100 d-flex align-items-center justify-content-center">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h2 class="text-white font-weight-bold">Your PDF has been successfully generated and stored.</h2>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">You can download it below.</p>
                    <a class="btn btn-primary btn-xl" href="/Php-to-pdf/storage/<?php echo urlencode($pdfFileName); ?>" download>Download PDF</a>
                </div>
            </div>
        </div>
    </header>
</body>

</html>