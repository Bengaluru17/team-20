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
$_SESSION["name"]=$_GET["name"];
echo "<h2> Welcome <br>".$_SESSION["name"]."</h2>";
?>
<ul class="pagination">
    <li><a href="#">Test 1</a></li>
  </ul>
</div>


<div class="col-md-offset-1 col-md-4">
<?php
$arr=array("male", "female", "other");

$random_keys=array_rand($arr,1);
echo "<h2>Select right button</h2>";
echo "<h3>".$arr[$random_keys]."</h3>";

?>
	<article>
    <h2 style="text-align:center;">Test 2</h2>
		<form method="post" action=front3.php>
  <input type="radio" name="gender" value="male" > Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
  <input type="radio" name="gender" value="other"> Other <br> 
  <input type="submit" name="submit" value="Submit">
  
</form> 
<form action=front4.php>
<button type="button" class="btn btn-primary btn-block">Test 3</button>T
</form>
<?php

if(isset($_POST["gender"])){
	
  $value2=$_POST["gender"];
if($value2!=$_SESSION["rad"])
{ 
    $error= "<span style='color:red'>Please select the correct button</span>";
}
else{
  $error= "<span style='color:green'>Correct button!</span>";
}}

$_SESSION["rad"]=$arr[$random_keys];



?>

	</article>
</div>
<div class="col-md-3">
	<h2 style="color:red; text-align:center">STATUS</h2>
	<?php
		if(isset($_POST["gender"]))
		{	echo "<h3 style='text-align:center'>".$error."</h3>";	}
	
	?>
</div>
</body>
</html>
