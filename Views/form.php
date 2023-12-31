<?php

require_once './validation.php';

session_start();
if (empty($_SESSION['csrf_token']) || (isset($_SESSION['csrf_token']['expiration']) && time() > $_SESSION['csrf_token']['expiration'])) {
    $csrf_token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = [
            'token' => $csrf_token,
            'expiration' => time() + 3600,
        ];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./startbootstrap/css/styles.css" rel="stylesheet" />
    <link href="./style/custom.css" rel="stylesheet" />
    <title>Form</title>
</head>

<body class="bg-img">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-lg-4">
                <div class="rd p-4 shadow">
                    <h2 class="text-center fs-2">Complete this form</h2>
                    <form class="mt-4" action="treatment.php" method="POST">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name..." autocomplete="$_SESSION" required />
                            <label for="name">Full name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" autocomplete="$_SESSION" required />
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="phone" id="phone" type="tel" placeholder="(123) 456-7890" maxlength="10" autocomplete="$_SESSION" required />
                            <label for="phone">Phone number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="address" class="form-control" id="address" placeholder="Enter your adress here..." style="height: 6rem" autocomplete="$_SESSION" required></input>
                            <label for="address">Address</label>
                        </div>
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <div class="d-grid"><button class="btn btn-primary btn-l" id="submitButton" type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>