
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tokenfield for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery UI CSS -->
    <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
    <!-- Bootstrap styling for Typeahead -->
    <link href="dist/css/tokenfield-typeahead.css" type="text/css" rel="stylesheet">
    <!-- Tokenfield CSS -->
    <link href="dist/css/bootstrap-tokenfield.css" type="text/css" rel="stylesheet">
    <!-- Docs CSS -->
    <link href="docs-assets/css/pygments-manni.css" type="text/css" rel="stylesheet">
    <link href="docs-assets/css/docs.css" type="text/css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

   
<?php
include "config.php";
include_once "Common.php";
$obj = new Common();
$ids = '';
$categories = $obj->getCategories($connection);
if ($categories->num_rows>0) {
  foreach ($categories as $category) {
    $arr[] =  [
      'value' => $category['id'],
       'label' => $category['name'],
    ];
    $ids .= $category['id'].',';
  }
  $ids = ltrim($ids,',');
 $ids= rtrim($ids,',');
  
}
 ?>
    <div class="container bs-docs-container">
      <div class="row">

      

        <div class="col-md-9" role="main">
            <!-- Glyphicons
            ================================================== -->
            <div class="bs-docs-section">
             
              <h2 id="examples">Examples</h2>
              <p>Create elegant taggable fields with copy/paste and keyboard support.</p>

              <p><strong>Using jQuery UI Autocomplete</strong></p>
          <form id="myForm"> 
              <div class="bs-example">
                <div class="form-group">
                  <input type="text" class="form-control" id="tokenfield" placeholder="Type something and hit enter" />
                </div>
              </div>
                    <input type="text"  class="form-control" name="oldCategory" id="oldCategory" value="<?php echo $ids; ?>">
                    <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary"><span id="buttonLabel">Save</span> </button>

            </form>
           
        </div>

      </div><!-- // row -->

    </div><!-- //container -->

    

    <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="dist/bootstrap-tokenfield.js" charset="UTF-8"></script>
    <script type="text/javascript" src="docs-assets/js/scrollspy.js" charset="UTF-8"></script>
    <script type="text/javascript" src="docs-assets/js/affix.js" charset="UTF-8"></script>
    <script type="text/javascript" src="docs-assets/js/typeahead.bundle.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="docs-assets/js/docs.min.js" charset="UTF-8"></script>

    <script type="text/javascript">
      $('#tokenfield').tokenfield({
          autocomplete: {
            source: <?php echo json_encode($arr) ?>,
            delay: 100
          },
          showAutocompleteOnFocus: true
        })

        $("form#myForm").on("submit",function(e) {
        e.preventDefault();
         var tokenfield = $("#tokenfield").val().trim();
         var oldCategory = $("#oldCategory").val();
        $.post("script.php",{tokenfield:tokenfield,oldCategory:oldCategory},function(response) {
          // body...
        });
  })

    </script>

  </body>
</html>
