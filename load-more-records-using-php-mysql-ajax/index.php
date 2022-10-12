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
    <title>How to load more records using php, mysql & AJAX - Coding Birds Online</title>
    <style> .blockquote  { font-size: 1.1rem !important; }</style>
</head>
<body>
<div class="container">
   <div class="mt-3 mb-3">
       <center>
           <img src="https://codingbirdsonline.com/wp-content/uploads/2020/01/cropped-coding-birds-online-favicon-180x180.png" width="50"/>
       </center>
   </div>
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div id="quotes-container"></div>
            <input type="hidden" id="page" value="0"/>
            <button
                type="button"
                id="load-more-btn"
                onclick="loadMoreQuotes();"
                class="btn btn-sm btn-success btn-block"
                >Load more...
                <div id="loading" class="spinner-border spinner-border-sm d-none" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>
    </div>
    <div class="row">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- middle-ads -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-5191137430270102"
             data-ad-slot="7861133754"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>
<script src="load-more-quotes.js"></script>
</body>
</html>
