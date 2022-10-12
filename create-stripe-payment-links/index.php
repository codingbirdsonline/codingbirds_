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
    <title>How to create custom stripe payment links in php - Coding Birds Online</title>
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
                    <h5 class="card-title text-center">Generate Stripe Payment Links</h5>
                    <form>
                        <div class="form-group">
                            <label for="price">Price <span class="required">*</span></label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="Price" required/>
                        </div>
                        <div class="form-group">
                            <label for="currency">Currency <span class="required">*</span></label>
                            <input type="text" name="currency" id="currency" value="INR" placeholder="Currency" class="form-control" readonly  required/>
                        </div>
                        <button type="button" onClick="generatePaymentLink()" class="btn btn-sm btn-primary btn-block">Generate Link <span class="fa fa-angle-right"></span></button>
                    </form>
                    <table id="paymentLinksTable" class="table">
                       <thead>
                           <tr>
                               <td>Sr.No</td>
                               <td>Price</td>
                               <td>Action</td>
                           </tr>
                       </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let srNo = 1;
    function generatePaymentLink(){
        let price = $("#price").val();
        let currency = $("#currency").val();
        $.ajax({
            url: 'script.php',
            method:'POST',
            data: { price, currency},
            success: function(response){
                let linksHtml = ``;
                 response = JSON.parse(response);
                    linksHtml += `<tr>
                        <td>${srNo}</td>
                        <td>${response.price}</td>
                        <td><a href="${response.link}" target="_blank" class="btn btn-sm btn-success">Pay now</a></td>
                        </tr>`;

                $("#paymentLinksTable tbody").append(linksHtml);
                srNo++;
            },
            error: function(error){
                console.log(error);
            }
        })
    }
</script>
</body>
</html>
