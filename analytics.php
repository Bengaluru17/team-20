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
<div class="col-md-8" style="border-left: 1px solid  #f4511e; padding-left:20px">
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


$sql="select level1, level2, level3, level4, level5, level6 from levels where id=1";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
$l1=($row["level2"]-$row["level1"])/60;
$l2=($row["level3"]-$row["level2"])/60;
$l3=($row["level4"]-$row["level3"])/60;
$l4=($row["level5"]-$row["level4"])/60;
$l5=($row["level6"]-$row["level5"])/60;
echo "<table class='table table-striped' style='float:right'>";
echo "<tr><th>Tutorial 1</th><th>Tutorial 2</th><th>Tutorial 3</th><th>Tutorial 4</th><th>Tutorial 5</th></tr>";
echo "<tr><th>".$l1."</th><th>".$l2."</th><th>".$l3."</th><th>".$l4."</th><th>".$l5."</th></tr>";

?>

</div>
</div>
<div class="row">
	<div class="col-md-6"><img src="line_graph.png"></div>
	<div class="col-md-6"><img src="bar_graph.png"></div>
</div>
</body>
</html>
