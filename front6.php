<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<style>
.jumbotron{
    background-color: #f4511e; /* Orange */
    color: #ffffff;
}

nav {
    float: left;
    max-width: 160px;
    margin: 0;
    padding: 1em;
}

</style>
<body>
<a class="navbar-brand" > <img src="final_logo-02.png" left="100" width="250" height="150"> </a>

<div class="jumbotron">
    <h1 style="padding-left:250px; margin-left:200px">Tutorial Sessions</h1>      
          
</div>
<div class="row">
<div class="col-md-offset-1 col-md-3">
<?php
session_start();

/*if(!isset($_GET["name"]))
{$_SESSION["name"]=$_GET["name"];
}*/
echo "<h2> Welcome <br>Vaibhav Khandelwal</h2>";
?>
</div>
<div class="col-md-4" style="border-left: 1px solid  #f4511e; padding-left:20px">
	<form action="front6.php" method="post" enctype="multipart/form-data">
    <h2>Select <span style="color:red">image.jpg</span> to upload</h2><br><br>
    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
    <input type="submit" value="Upload Image" name="submit">
</form>


<?php
$name="image.jpg";
if(isset($_POST["submit"]))
{	$dir="uploads/";
	$file=$dir. basename($_FILES["fileToUpload"]["name"]);
	$imagetype=  pathinfo($file,PATHINFO_EXTENSION);

	if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>

<a href="front6.php">
<button type="button" class="btn btn-primary btn-block">Training form</button>
</a>

</div>
<div class="col-md-3">
	<h2 style="color:red; text-align:center">Status</h2>
	<?php
	if(isset($_POST["submit"])) {	
		if($name==$_FILES["fileToUpload"]["name"])
		{
			echo "<span style='color:green;text-align:center'><h3>Matched</h3></span>";
		}
		else
		{
			echo "<span style='color:red;text-align:center'><h3>Wrong file</h3></span>";
	
		}
	}
	?>

</div>
