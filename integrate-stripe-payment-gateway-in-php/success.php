
<?php
session_start();
require_once "Database.php";
require_once "StripeHelper.php";
require_once "User.php";

$stripeHelper = new StripeHelper();
if(isset($_SESSION['user_id'])){
    $user = new User();
    $database = new Database();
    $sessionId = $_GET['session_id'];
    $userId = $_SESSION['user_id'];
    $checkoutSession = $stripeHelper->getSession($sessionId);
    $user->updatePaymentStatus($database->connection, $checkoutSession->payment_intent, $userId);
}else{
    header("Location: index.php");
}

//echo '<pre>';
///print_r($checkoutSession);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <title>Success | How to integrate stripe payment gateway in php - Coding Birds Online</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body" style="outline: 2px solid #23e323">
                    <h5 class="card-title text-center">Payment success</h5>
                    <p>Transaction ID: <?php echo $checkoutSession->payment_intent; ?> </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

