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
    <title>How to integrate stripe payment gateway in php - Coding Birds Online</title>
    <style> .required { color: red; font-weight: bold }</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <center>
                        <img src="https://codingbirdsonline.com/wp-content/uploads/2020/01/cropped-coding-birds-online-favicon-180x180.png" width="50"/>
                    </center> <br/>
                    <h5 class="card-title text-center">Join This College Event</h5>
                    <form action="checkout.php" method="post">
                        <div class="form-group">
                            <label for="name">Name <span class="required">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Name" required/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="required">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required/>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact <span class="required">*</span></label>
                            <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact" maxlength="10" required/>
                        </div>
                        <div class="form-group">
                            <label for="amount">Fee Amount <span class="required">*</span></label>
                            <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount" value="100" readonly required/>
                        </div>
                        <button type="submit" name="payNowBtn" class="btn btn-lg btn-primary btn-block">Pay Now <span class="fa fa-angle-right"></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
