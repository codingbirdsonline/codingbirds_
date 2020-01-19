<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>How to partially hide email address in PHP using AJAX - Coding Birds Online</title>
    <style>.required{color: #FF0000;}</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <center><img width="50" src="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png"></center>
                    <h5 class="card-title text-center">Partially hide email address in php </h5>
                    <form id="myForm">
                        <div class="form-label-group">
                            <label for="inputEmail">Email <span class="required">*</span></label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter email ">
                        </div><br/>
                        <div id="partiallyHiddenEmail"></div><br/>
                        <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-md btn-primary btn-block text-uppercase" >Hide</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
   $("form#myForm").on("submit",function (e) {
       e.preventDefault();
      var email = $("#email").val();
      if (email == ""){
          alert("Please enter email");
          $("#email").focus();
      }else if (!validateEmail(email)){
          alert("Please enter valid email");
          $("#email").focus();
      } else {
          $.post("script.php",{key:"hideEmailAddress",email:email},function (response) {
            $("#partiallyHiddenEmail").html(response);
          });
      }
   });

   function validateEmail(inputText) {
       var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
       if(inputText.match(mailformat)) {
           return true;
       } else{
           return false;
       }
   }
</script>
</body>
</html>
