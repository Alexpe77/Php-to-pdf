<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./startbootstrap/css/styles.css" type="text/css" rel="stylesheet" />
    <title>Success</title>
</head>

<body>
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h2 class="text-white font-weight-bold">Your PDF has been successfully generated and stored.</h2>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">You can download it below.</p>
                    <a class="btn btn-primary btn-xl" href="download.php?file=<?php echo urlencode($pdfFileName); ?>">Download PDF</a>
                </div>
            </div>
        </div>
    </header>
</body>

</html>