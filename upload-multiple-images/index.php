
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Multiple Images with PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
</head>
<body>

<div class="jumbotron text-center">
    <h1>Upload Multple Images with PHP</h1>
    <p>Resize this responsive page to see the effect!</p>
</div>

<div class="container">
    <form action="upload-script.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
               <div class="col-md-4">
                   <div class="form-group">
                       <input type="file" name="imageFile[]" required multiple class="form-control">
                   </div>
               </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="submit" name="uploadImageBtn" id="uploadImageBtn" value="Upload Images" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <?php
        // fetch Images
        $i = 1;
        include "config.php";
        $queryGetImg = "SELECT * FROM bird_multiple_images";
        $resultImg = $connection->query($queryGetImg);
        if ($resultImg->num_rows > 0 ){
            while ($row = $resultImg->fetch_object()){ ?>
                <div class="col-sm-3">
                    <h3>Image <?php echo $i;?></h3>
                    <img src="<?php echo 'uploads/'.$row->imgName;?>"/>
                </div>
           <?php $i++;
            }
        }
        ?>
    </div>
</div>

</body>
</html>
