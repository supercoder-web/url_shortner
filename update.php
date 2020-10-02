<!DOCTYPE html>
<title>My Example</title>
<?php
include 'url_shortner/include/connection/init.php';
include 'url_shortner/include/function/function.php';

?>

<!-- Latest compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
body {
padding-top: 1em;
}   
</style> 
 


<div class="container">
<form action="update_data.php" method="POST">
<div class="form-group row">
<label for="first_name" class="col-xs-3 col-form-label mr-2">URL</label>
<div class="col-xs-9">
<input type="text" class="form-control" id="first_name" name="url" value="<?php echo UrlShowdata($_GET['id'])['url']; ?>">
<input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id']; ?>">
</div>
</div>

<div class="form-group row">
<div class="offset-xs-3 col-xs-9">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
</div>

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Initialize Bootstrap functionality -->
<script>
// Initialize tooltip component
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Initialize popover component
$(function () {
  $('[data-toggle="popover"]').popover()
})

$("form").submit(function(e) {
  e.preventDefault();
});
</script