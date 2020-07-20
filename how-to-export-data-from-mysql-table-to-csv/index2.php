<!DOCTYPE html>
<html lang="en">
<head>
    <title>Export table data to csv file in php - Coding Birds Online</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="validation.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <style>
        #thead>tr>th{ color: white; }
    </style>
</head>
<body>
<div style="margin-top: 20px;padding-bottom: 20px;">
    <center>
        <img width="100" src="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png"/>
        <h3>Export table data to csv file in php</h3>
    </center>
</div>
<div class="container">
    <form action="export-table-script.php" method="post">
        <table class="table table-bordered table-condensed">
            <thead id="thead" style="background-color:#ff195a">
            <tr>
                <th>Sr.No</th>
                <th>Name</th>
                <th>Class</th>
                <th>Total Markes</th>
                <th>Gender</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include "config.php";
            include_once "Common.php";
            $common = new Common();
            $records = $common->getAllRecords($connection);
            if ($records->num_rows>0){
                $sr = 1;
                while ($record = $records->fetch_object()) {
                    $recordId = $record->id;
                    $name = $record->name;
                    $class = $record->class;
                    $marks = $record->marks;
                    $gender = $record->gender;?>
                    <tr>
                        <td><?php echo $sr;?></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo $class;?></td>
                        <td><?php echo $marks;?></td>
                        <td><?php echo $gender;?></td>
                    </tr>
                    <?php
                    $sr++;
                }
            }
            ?>
            </tbody>
        </table>
        <button type="button" onclick="getExcel();" name="exportBtn" id="exportBtn" class="btn btn-primary"style="float: right">Export Data</button>
    </form>
    
    <script type="text/javascript">
        function getExcel() {
            $.post("",{},function (response) {
                
            })
        }
    </script>
</div>
</body>
</html>
