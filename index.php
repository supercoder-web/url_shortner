<?php
include 'url_shortner/include/connection/init.php';
include 'url_shortner/include/function/user_function.php';


if(SessionEmail()==true){
$_SESSION['uid']=getUserId($_SESSION['Email']);


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Datatable CSS -->
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>main</title>
  </head>
  <body>
    <a href="logout.php">Logout</a>
  	<div class="container">
  		<div class="row  justify-content-center align-items-center">
  		
  			<div class="col-4">
             <label class="sr-only">URL</label>
               <input type="text" class="form-control" type="url" name="Orginal_URL" placeholder="URL" name="url">
                </div>
                <div class="col-4">
             <input type="submit" name="submit"  class="btn btn-success " value="Generate">
			<p class="errors"></p>
			<p class="short_url"></p>
                </div>
          
  			
  		</div>
  		<!-- Table -->
        <div class="col-6">
<table id='urlsdata' class='display dataTable'>

  <thead>
    <tr>
      <th>url</th>
      <th>short url</th>
      <th>Visit</th>
      <th>time created</th>
     <th>delete</th>
     <th>update</th>
    </tr>
  </thead>

</table>
  		</div>
  	
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('input[type="submit"]').click(function(e){
			e.preventDefault();
			$('.errors').html('');
			alert(e);
			var url = $('input[name="Orginal_URL"]').val();
			if(url.length==0){
				$('.errors').html('whoops! please enter URL ');
				return false;
			}
			$.post('url_shortner/include/generator.php', {url: url}, function(data, textStatus, xhr) {
				$('.short_url').html('<a href='+data+'>'+data+'</a>');
			});
		});
	});
  $(document).ready(function() {
   var table = $('#urlsdata').dataTable({
"bProcessing": true,
"sAjaxSource": "pagination.php",
"bPaginate":true,
"sPaginationType":"full_numbers",
"iDisplayLength": 5,
"aoColumns": [
{ mData: 'url' } ,
{ mData: 'short' },
{ mData: 'count' },
{ mData: 'timestamp' },
{ mData: 'delete' },
{ mData: 'update' },
]
});
} );
</script>

</body>
</html>
<?php
}
else{

header('Location:signup_form.php');
}
?>