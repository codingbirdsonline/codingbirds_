<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <title>How to make searchable dropdown with country flag - Coding Birds Online</title>
    <style>.required{color: #FF0000;}
           .flag{background-color: #ff884b;padding: 10px;border-radius: 20px;color: white}
    </style>
</head>
<body>
<div class="container">
    <?php
    include "config.php";
    $query = "SELECT * FROM bird_searchable_dropdown";
    $countries = $connection->query($query);
    ?>
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <center><img width="50" src="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png"></center>
                    <h5 class="card-title text-center">Searchable dropdown with country <span class="flag">FLAG</span></h5>
                    <form>
                        <div class="form-label-group">
                            <label for="inputEmail">Country <span class="required">*</span></label>
                            <select  name="select2" id="select2" class="form-control">
                                <option value="">Select</option>
                                <?php
                                if ($countries->num_rows>0){
                                    while ($country = $countries->fetch_object()){ ?>
                                        <option value="<?php echo $country->code;?>"><?php echo $country->countryname;?></option>
                                   <?php  }
                                }
                                ?>
                            </select>
                        </div> <br/>
                        <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-md btn-primary btn-block text-uppercase" >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#select2").select2({
        templateResult: formatState
    });
    function formatState (state) {
        if (!state.id) {
            return state.text;
        }
        var baseUrl = "flags";
        var $state = $(
            '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
        );
        return $state;
    }
</script>
</body>
</html>
