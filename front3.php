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
<div class="col-md-3" style="text-align:center">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database="cfg";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}

$t=time();
$sql="UPDATE levels SET level2=$t WHERE id=1";
mysqli_query($conn, $sql);

?>
<?php
session_start();
echo "<h2> Welcome <br>".$_SESSION["name"]."</h2>";

?>
<br><br>
<iframe width="300" height="300" src="https://www.youtube.com/embed/TAP9RklNPtc?ecver=1" frameborder="0" allowfullscreen></iframe>
</div>


<div class="col-md-6" style="border-left: 1px solid  #f4511e;border-right: 1px solid  #f4511e; padding-left:20px">

	<article>
    <h2 style="text-align:center;">Level 2</h2>
		
		<form method="post" action=front3.php>
		<div>
		<?php
			$arr=array("male", "female", "other");

			$random_keys=array_rand($arr,1);
			echo "<h4>Select right button</h4>";
			echo "<h2 style='text-align:center;background-color:#f4511e;color:white;margin-right:150px;margin-left:150px'>".$arr[$random_keys]."</h2>";

		?>
		<div class="radio">
			<label><input type="radio" name="gender" value="male">Male</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="gender" value="female">Female</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="gender" value="other">Other</label>
		</div>
		</div>
		<br><br>
		<div>
		<?php
			$arr2=array("Green", "yellow", "red");

			$random_keys2=array_rand($arr2,1);
			echo "<h4>Select right button</h4>";
			echo "<h2 style='text-align:center;background-color:#f4511e;color:white;margin-right:150px;margin-left:150px'>".$arr2[$random_keys2]."</h2>";

		?>
		<div class="radio">
			<label><input type="radio" name="color" value="green">Green</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="color" value="yellow">Yellow</label>
		</div>
			<div class="radio">
			<label><input type="radio" name="color" value="red">red</label>
		</div>
		</div>
		<br><br>
		<div>
		<?php
			$arr3=array("male", "female", "other");

			$random_keys3=array_rand($arr3,1);
			echo "<h4>Select right button</h4>";
			echo "<h2 style='text-align:center;background-color:#f4511e;color:white;margin-right:150px;margin-left:150px'>".$arr3[$random_keys3]."</h2>";

		?>
		<div class="radio">
			<label><input type="radio" name="gender3" value="male">Male</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="gender3" value="female">Female</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="gender3" value="other">Other</label>
		</div>
		</div>
			
			<button type="submit" class='btn btn-primary btn-block' >Submit</button>
  
		</form> 

<?php
$count=0;
if(isset($_POST["gender"])){
	
  $value=$_POST["gender"];
if($value!=$_SESSION["rad"])
{ 
    $error= "<span style='color:red'>Please select the correct button</span>";
}
else{
  $error= "<span style='color:green'>Correct button!</span>";
  $count=$count+1;
}}

$_SESSION["rad"]=$arr[$random_keys];


if(isset($_POST["color"])){
	
  $value2=$_POST["color"];
if($value2!=$_SESSION["rad2"])
{ 
    $error2= "<span style='color:red'>Please select the correct button</span>";
}
else{
  $error2= "<span style='color:green'>Correct button!</span>";
	$count=$count+1;
  }}

$_SESSION["rad2"]=$arr2[$random_keys2];


if(isset($_POST["gender3"])){
	
  $value3=$_POST["gender3"];
if($value3!=$_SESSION["rad3"])
{ 
    $error3= "<span style='color:red'>Please select the correct button</span>";

}
else{
  $error3= "<span style='color:green'>Correct button!</span>";
	$count=$count+1;
  }}

$_SESSION["rad3"]=$arr3[$random_keys3];



?>

	</article>

</div>
<div class="col-md-3">
	<h2 style="color:red; text-align:center">STATUS</h2>
	<?php
		if(isset($_POST["gender"]))
		{	echo "<h3 style='text-align:center'>".$error."</h3>";
			echo "<h3 style='text-align:center'>".$error2."</h3>";
			echo "<h3 style='text-align:center'>".$error3."</h3>";}
			
		if(isset($_POST["gender"])&&$count>2)
		{
			echo "<br><h2>SUCCESSFUL !</h2>";
			echo "<a href='front4.php'
			<button type='button' class='btn btn-primary btn-block'>Level 3</button>
			</a>";
		}
	
	?>
</div>
</body>
</html>
