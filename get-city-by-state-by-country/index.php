<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Excel(CSV) file with PHP - CodingBirdsOnline.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <style>
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    #box {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        margin: 0px 200px 0px 200px;
    }
</style>
</head>
<body>
<div class="jumbotron text-center">
    <h1>Get City by State by Country</h1>
    <p>https://codingbirdsonline.com</p>
</div>


<div id="box">
    <form action="script.php" method="post">
        <?php
        include "config.php";
        include_once "Common.php";
        $common = new Common();
        $countries = $common->getCountry($connection);
        ?>

        <label>Country <span style="color:red">*</span></label>
        <select name="country" id="countryId" class="form-control" onchange="getStateByCountry();">
            <option value="">Country</option>
            <?php
            if ($countries->num_rows > 0 ){
                while ($country = $countries->fetch_object()) {
                    $countryName = $country->name; ?>
                    <option value="<?php echo $country->id; ?>"><?php echo $countryName;?></option>
                <?php }
            }
            ?>
        </select>

        <label>State <span style="color:red">*</span></label>
        <select class="form-control" name="state" id="stateId" onchange="getCityByState();" >
            <option value="">State</option>
        </select>

        <label>City <span style="color:red">*</span></label>
        <select class="form-control" name="city" id="cityDiv">
            <option value="">City</option>
        </select>

        <input type="submit" value="Submit">
    </form>
</div>



<script>
    function getStateByCountry() {
        var countryId = $("#countryId").val();
        $.post("ajax.php",{getStateByCountry:'getStateByCountry',countryId:countryId},function (response) {
            var data = response.split('^');
            $("#stateId").html(data[1]);
        });
    }
    function getCityByState() {
        var stateId = $("#stateId").val();
        $.post("ajax.php",{getCityByState:'getCityByState',stateId:stateId},function (response) {
            var data = response.split('^');
            $("#cityDiv").html(data[1]);
        });
    }
</script>
</body>
</html>
