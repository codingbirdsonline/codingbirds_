<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Application in PHP using AJAX - Coding Birds Online</title>
    <link rel="shortcut icon" href="https://demo.codingbirdsonline.com/website/img/coding-birds-online/coding-birds-online-favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="custom.css">
</head>
<body>
<div style="margin-top: 10px;"><img width="100" src="https://demo.codingbirdsonline.com/website/img/coding-birds-online/coding-birds-online-favicon.png" class="center-block"/></div>
<div class="container">
    <h3>Delete multiple records from database using PHP </h3>
    <a href="javaScript:void(0);" data-toggle="modal" data-target="#myModal" class="btn btn-primary pull-right bottom-gap">Add New <i class="fa fa-plus" aria-hidden="true"></i></a>
    <table class="table table-bordered">
        <thead id="thead" style="background-color:#135361">
            <tr>
                <th>Sr.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="crudData"></tbody>
    </table>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">CRUD Application Form</h4>
            </div>
            <div class="modal-body">
                <form id="crudAppForm">
                   <div class="row">
                       <div class="col-md-4">
                           <div class="form-group">
                               <label for="name">Name <span class="field-required">*</span></label>
                               <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <label for="email">Email <span class="field-required">*</span></label>
                               <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <label for="contact">Contact <span class="field-required">*</span></label>
                               <input type="text" name="contact" id="contact" placeholder="Contact" class="form-control">
                           </div>
                       </div>
                   </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="hidden" name="editId" id="editId" value="" />
                            <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary"><i class="fa fa-spinner fa-spin" id="spinnerLoader" ></i> <span id="buttonLabel">Save</span> </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="crud-app.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
