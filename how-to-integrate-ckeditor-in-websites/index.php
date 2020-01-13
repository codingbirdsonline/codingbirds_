<!DOCTYPE html>
<html lang="en">
<head>
    <title>How to integrate ckeditor in websites - CodingBirdsOnline.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <style>#box {border-radius: 5px;background-color: #f2f2f2;padding: 20px;margin: 0px 200px 0px 200px;}</style>
</head>
<body>
<div class="jumbotron text-center">
    <h1>How to integrate ckeditor in websites</h1>
    <p>https://codingbirdsonline.com</p>
</div>

<div id="box">
    <textarea name="editor1"></textarea>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
</div>
</body>
</html>
