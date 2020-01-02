<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Check username availability in php using ajax - Coding Birds Online</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <center>
                        <img width="50 " src="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png">
                    </center>
                    <h5 class="card-title text-center">Check Username Availability</h5>
                    <label>[ankit,manish,rohit not available]</label>
                    <form id="checkingForm" class="form-signin">
                        <div class="form-label-group">
                            <label for="inputEmail">Username<span style="color: #FF0000">*</span></label>
                            <input type="text" name="username" id="username" class="form-control" onkeyup="checkUsernameAvailablity();" placeholder="Start typing username" autocomplete="off" required>
                        </div> <br/>
                        <div class="form-label-group" id="usernameAvailabilityLoader" style="display: none">
                            <img src="loading-icon.gif"/>  <label for="inputEmail">Please Wait a moment...</label>
                        </div>
                        <div class="form-label-group" id="usernameAvailableLabel" style="display: none">
                            <img src="success-icon.png" width="20"/>  <label for="inputEmail">Username available</label>
                        </div>
                        <div class="form-label-group" id="usernameNotAvailableLabel" style="display: none">
                            <img src="error-icon.png" width="20"/>  <label for="inputEmail">Username not available </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function checkUsernameAvailablity() {
        var username = $("#username").val();
        if (username !="") {
            $("#usernameAvailabilityLoader").show();
            $.post("availability-check-script.php",{key:"usernameCheck",username:username},function (response) {
                var data = response.split('^');
                if (data[1] == "available"){
                    $("#usernameAvailableLabel").show();
                    $("#usernameNotAvailableLabel").hide();
                }else if (data[1] == "notAvailable"){
                    $("#usernameNotAvailableLabel").show();
                    $("#usernameAvailableLabel").hide();
                }
                $("#usernameAvailabilityLoader").hide();
            });
        }else{
            $("#usernameAvailabilityLoader").hide();
            $("#usernameAvailableLabel").hide();
            $("#usernameNotAvailableLabel").hide();
        }
    }
</script>
</body>
</html>
