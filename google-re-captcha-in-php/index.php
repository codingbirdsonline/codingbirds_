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
    <title>Google re-Captcha - Coding Birds Online</title>
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Google re-Captcha</h5>
                    <form action="verify-captcha.php" method="post" id="reCaptchaForm" class="form-signin">
                        <div class="form-label-group">
                            <label for="inputEmail">Name<span style="color: #FF0000">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" required placeholder="Name">
                        </div> <br/>
                        <div class="form-label-group">
                            <label for="inputEmail">Email<span style="color: #FF0000">*</span></label>
                            <input type="text" name="email" id="email" class="form-control" required placeholder="Email">
                        </div> <br/>
                        <div class="form-label-group">
                            <div class="g-recaptcha" data-sitekey="your_site_key">
                            </div> <br/>
                            <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-lg btn-primary btn-block text-uppercase" >Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
