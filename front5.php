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
	<h2>Level 4</h2>
	<h3>Select date <span style="color:red">9/7/2017</span></h3>
<form action="front5.php" method="POST">
	<div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" id="dat" name="date">
    </div>
  
	<button type="submit" class="btn btn-default">Submit</button>
</form>

	<a href="front6.php">
<button type="button" class="btn btn-primary btn-block">Level 5</button>
</a>
</div>

<div class="col-md-3">
	<h2 style="color:red; text-align:center">Status</h2>
	<?php
	$date="2017-07-09";
	if(isset($_POST["date"]))
	{$dob=explode("-", $_POST["date"]);
	$do=explode("-",$date);
	
	if($do[0]!=$dob[0])
		{
			echo "<span style='color:blue;text-align:center'><h3>Year is wrong</h3></span>";
		}
		else if($do[1]!=$dob[1])
		{
			echo "<span style='color:blue;text-align:center'><h3>Month is wrong</h3></span>";
		}
		else if($do[2]!=$dob[2])
		{
			echo "<span style='color:blue;text-align:center'><h3>Day is wrong</h3></span>";
		}
		else
		{
			echo "<span style='color:green;text-align:center'><h3>Matched</h3></span>";
		}
	} 	
	?>
