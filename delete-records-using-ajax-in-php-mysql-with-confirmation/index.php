<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delete records from database using PHP - Coding Birds Online</title>
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>Hello, world!</title>
</head>
<body>
<div class="container" style="padding-top: 20px;">
    <div class="d-flex justify-content-center">
        <img width="50" src="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png"/>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Delete Records using AJAX in PHP & MySQL</h5>
                    <table class="table table-condensed">
                        <thead style="background-color: #16cc9b;color: white" >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Class</th>
                            <th scope="col">Marks</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody id="table-data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="delete-script.js"></script>
<script>
    //Swal.fire('Good job!', 'You clicked the button!', 'success')
</script>
</body>
</html>
