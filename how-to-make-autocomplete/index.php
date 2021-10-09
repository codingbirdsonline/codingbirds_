<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>-->
    <title>How to make autocomplete input box php ajax - Coding Birds Online</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <center>
                        <img width="50 " src="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png">
                    </center>
                    <h5 class="card-title text-center">Autocomplete Input box example</h5>
                    <label>search : [ankit,manish]</label>
                    <form class="form-signin">
                        <div class="form-label-group">
                            <label for="inputEmail">Username<span style="color: #FF0000">*</span></label>
                            <select name="username" id="username" class="form-control js-data-example-ajax">

                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $( document ).ready(function() {
        $('.js-data-example-ajax').select2({
            ajax: {
                url: "autocomplete-script.php",
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term // search term
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.username,
                                id: item.id,
                                url:"sss",
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('#username').on('select2:select', function (e) {
            var data = e.params.data;
            window.location.href = data.id;
        });
    });

</script>
</body>
</html>
