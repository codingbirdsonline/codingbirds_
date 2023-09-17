<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <title>Send email in PHP using PHPMailer with attachment | CodingBirdsOnline</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <?php
                    session_start();
                    if(isset($_SESSION['success_message'])){
                        echo '<div class="alert alert-success">
                                  <strong>Success!</strong> '.$_SESSION['success_message'].'
                               </div>';
                    }
                    if(isset($_SESSION['error_message'])){
                        echo '<div class="alert alert-danger">
                                  <strong>Error!</strong> '.$_SESSION['error_message'].'
                               </div>';
                    }
                    session_destroy();
                    ?>
                    <div class="card-body">
                        <center>
                            <img width="50" src="https://codingbirdsonline.com/wp-content/uploads/2020/01/cropped-coding-birds-online-favicon-192x192.png">
                        </center>
                        <h5 class="card-title text-center">Send email in PHP using PHPMailer with attachment</h5>
                        <form action="email-script.php" method="post" class="form-signin" enctype="multipart/form-data">
                            <div class="form-label-group">
                                <label for="to_email">To <span style="color: #FF0000">*</span></label>
                                <input type="email" name="to_email" id="to_email" class="form-control" placeholder="To" value="ankitprajapati123456@gmail.com"  required />
                            </div> <br/>
                            <div class="form-label-group">
                                <label for="subject">Subject <span style="color: #FF0000">*</span></label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required/>
                            </div> <br/>
                            <label for="contact">Attachment</label>
                            <div class="form-label-group">
                                <input type="file" id="attachment" name="attachment"/>
                            </div><br/>
                            <label for="subject">Message <span style="color: #FF0000">*</span></label>
                            <div class="form-label-group">
                                <textarea type="text" id="message" name="message"  class="form-control" placeholder="Message" required></textarea>
                            </div><br/> <br/>
                            <button type="submit" name="sendMailBtn" value="Send Email" class="btn btn-lg btn-primary btn-block text-uppercase" >Send Email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
