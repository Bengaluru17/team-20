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
$sql="UPDATE levels SET level3=$t WHERE id=1";
mysqli_query($conn, $sql);

?>
<?php
session_start();

/*if(!isset($_GET["name"]))
{$_SESSION["name"]=$_GET["name"];
}*/
echo "<h2> Welcome <br>Vaibhav Khandelwal</h2>";
?>
</div>

<div class="col-md-6" style="border-left: 1px solid  #f4511e;border-right: 1px solid  #f4511e; padding-left:20px">
	<h2>Level 3</h2>
	<h3>Select state <span style="color:red">Karnataka</span></h3>
	<article>
	<form action="front4.php" method="POST">	
		<div class="form-group">
		<label for="sel1">State:</label>
		<select class="form-control" id="sel1" name="State">
			<option value="Rajasthan">Rajasthan</option>
			<option value="Uttar Pradesh">Uttar Pradesh</option>
			<option value="Karnataka">Karnataka</option>
			<option value="Tamil Nadu">Tamil Nadu</option>
		</select>
		</div>
		<button type="submit" class='btn btn-primary btn-block' >Submit</button>
	</form>	
	</article>
	
	
</div>

<div class="col-md-3">
	<h2 style="color:red; text-align:center">Status</h2>
	
	<?php
	$st="Karnataka";
	
		if(isset($_POST["State"]))
		{
			$state=$_POST["State"];
			if($st!=$state)
			{
				echo "<span style='color:red;text-align:center'><h3>Select right option</h3></span>";
				$value=0;
			}
			else
			{
				$value=1;
				echo "<span style='color:green;text-align:center'><h3>Matched</h3></span>";
			}
		}
		
		if(isset($_POST["State"])&&$value==1)
		{
			echo "<br><h2>SUCCESSFUL !</h2>";
			echo "<a href='front5.php'
			<button type='button' class='btn btn-primary btn-block'>Level 4</button>
			</a>";
		}	
	
	
	?>
</div>
</body>
</html>
