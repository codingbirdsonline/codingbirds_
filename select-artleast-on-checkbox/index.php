<!DOCTYPE html>
<html>
<head>
	<title>Select atleast one check box</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
	<form action="script.php" method="post">
	<input class='roles' name='roles[]' type='checkbox' value='1' /> Item 1
	<input class='roles' name='roles[]' type='checkbox' value='2' /> Item 1
	<input class='roles' name='roles[]' type='checkbox' value='3' />Item 1
	<input class='roles' name='roles[]' type='checkbox' value='4' />Item 1
	<input class='roles' name='roles[]' type='checkbox' value='5' />Item 1
	<input type='submit' name="submit" value='submit' onclick="return valuealidate();" />
	</form>

	
	<script type="text/javascript">
		function valuealidate() {

		    var count_checked = $("[name='roles[]']:checked").length; 
		    if (count_checked == 0) {
		        alert("Please check at least one checkbox");
		        return false;
		    }else{
				alert('ok'); 
				return true;
			}
			//alert('hi');
		}
		  
		
	</script>
</body>
</html>