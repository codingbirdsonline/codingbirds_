<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="ajax.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        th{ color: white; }
        .modal-busy {
            position: fixed;
            z-index: 999;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            background-color: Black;
            filter: alpha(opacity=60);
            opacity: 0.6;
            -moz-opacity: 0.8;
        }
        .center-busy {
            z-index: 1000;
            margin: 300px auto;
            padding: 0px;
            width: 130px;
            filter: alpha(opacity=100);
            opacity: 1;
            -moz-opacity: 1;
        }
        .center-busy img {
            height: 128px;
            width: 128px;
        }
    </style>
</head>
<body>

<div class="container" style="margin-top: 50px;">
    <center>
        <img width="50"  src="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png"/>
    </center>
    <h2>Create loading spinner indicator in jquery ajax, while data loads</h2>
    <p>How to create loading spinner indicator in jquery ajax</p>
    <table class="table">
        <thead>
        <tr style="background-color: #1573ff">
            <th>Sr.No</th>
            <th>Name</th>
            <th>Class</th>
            <th>Marks</th>
            <th>Gender</th>
        </tr>
        </thead>
        <tbody id="tbody"></tbody>
    </table>
</div>
</body>
<div class="modal-busy" id="loader" style="display: none">
    <div class="center-busy" id="test-git">
        <img alt="" src="ajax-loading.gif" />
    </div>
</div>
</html>
