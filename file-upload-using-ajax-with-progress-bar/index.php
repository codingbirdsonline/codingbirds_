<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>jQuery Ajax Image Upload with Animating Progress Bar</h1>
<div class="form-container">
    <form action="uploadFile.php" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile"><br>
        <input type="submit" value="Upload File to Server">
    </form>

    <div class="progress">
        <div class="bar"></div >
        <div class="percent">0%</div >
    </div>

    <div id="status"></div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        var bar = $('.bar');
        var percent = $('.percent');
        var status = $('#status');

        $('form').ajaxForm({
            beforeSend: function() {
                status.empty();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            complete: function(xhr) {
                status.html(xhr.responseText);
            }
        });
    });
</script>
</body>
</html>