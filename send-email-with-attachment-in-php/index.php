<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>How to send email with attachment in PHP  &ndash; Coding Birds Online</title>
    <meta name="theme-color" content="#000000">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../website/img/coding-birds-online/coding-birds-online-favicon.png">
    <meta name="author" content="Ankit Kumar">
    <meta name="description" content="Demo &ndash; Coding Birds Online is a blogging website, minimizes the difficulties of coding and development that every new fresher faces in his career. we provide information on free resources, techniques of coding and problem-solving codes on our website.">
    <meta name="keywords" content="Coding Birds Online Demo, coding birds demo, project demo, live demo, tutorials, programming, web technologies, coding,HTML,CSS,PHP,CodeIgniter">

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Demo &ndash; Coding Birds Online is a blogging website, minimizes the difficulties of coding and development that every new fresher faces in his career. we provide information on free resources, techniques of coding and problem-solving codes on our website." />
    <meta name="twitter:title" content="Demo &ndash; Coding Birds Online" />
    <meta name="twitter:creator" content="@DeveloperAnkit" />

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Demo &ndash; Coding Birds Online" />
    <meta property="og:description" content="Demo &ndash; Coding Birds Online is a blogging website, minimizes the difficulties of coding and development that every new fresher faces in his career. we provide information on free resources, techniques of coding and problem-solving codes on our website." />
    <meta property="og:url" content="https://demo.codingbirdsonline.com/" />
    <meta property="og:site_name" content="Demo &ndash; Coding Birds Online" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--==================CSS==================-->
    <link rel="stylesheet" href="../website/css/font-awesome.min.css">
    <link rel="stylesheet" href="../website/css/bootstrap.css">
    <link rel="stylesheet" href="../website/css/main.css">
    <link rel="stylesheet" href="../website/css/custom.css">
    <!--==================CSS==================-->


</head>
<body>
<header id="header">
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.php"><img src="../website/img/coding-birds-online/coding-birds-online-logo.png" width="133" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="https://demo.codingbirdsonline.com/">Demos</a></li>
                    <li><a href="https://codingbirdsonline.com/about-ankit/">About</a></li>
                    <li><a href="https://codingbirdsonline.com/">Blog</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<section class="top-category-widget-area pt-90 "></section>
<section class="post-content-area pt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <center><img src="../website/img/coding-birds-online/coding-birds-online-favicon.png" width="70"></center>
                        <h5 class="card-title text-center">Send email with attachment in PHP</h5>
                        <form method="post" action="email-script.php" enctype="multipart/form-data" id="emailForm">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" >
                                <div id="nameError" style="color: red;font-size: 14px;display: none">nameError</div>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email address" >
                                <div id="emailError" style="color: red;font-size: 14px;display: none">emailError</div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control"  placeholder="Subject" >
                                <div id="subjectError" style="color: red;font-size: 14px;display: none">subjectError</div>
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" placeholder="Write your message here"></textarea>
                                <div id="messageError" style="color: red;font-size: 14px;display: none">messageError</div>
                            </div>
                            <div class="form-group">
                                <input type="file" name="attachment" id="attachment" class="form-control">
                                <div id="attachmentError" style="color: red;font-size: 14px;display: none">attachmentError</div>
                            </div>
                            <div class="submit">
                                <input type="submit" name="submit" onclick="return validateEmailSendForm();" class="btn btn-success" value="SUBMIT">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 sidebar-widgets" style="margin-top: 5px;">
                <div class="widget-wrap">
                    <div class="single-sidebar-widget ads-widget">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- Sidebar -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-5191137430270102"
                             data-ad-slot="8430025687"
                             data-ad-format="auto"
                             data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <div class="single-sidebar-widget ads-widget">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- Sidebar -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-5191137430270102"
                             data-ad-slot="8430025687"
                             data-ad-format="auto"
                             data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End post-content Area -->

<!-- start footer Area -->
<footer class="section-gap">
    <div class="container">
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
            <!--            <img src="https://cheerup.theme-sphere.com/magazine/wp-content/uploads/sites/7/2017/03/themela.jpg"  class="card-img">-->

        </div>
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-12 footer-text text-center">
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed & Developed <i class="fa fa-heart-o" style="color: #6788F8" aria-hidden="true"></i> by <a href="https://ankit.codingbirdsonline.com" target="_blank">Ankit kumar</a>
            </p>
        </div>
    </div>
</footer>
<!-- End footer Area -->

<script src="../website/js/vendor/jquery-2.2.4.min.js"></script>
<script src="validation-script.js"></script>
<script src="../website/js/vendor/bootstrap.min.js"></script>
<script src="../website/js/main.js"></script>
</body>
</html>
