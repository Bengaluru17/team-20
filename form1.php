<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="form1.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
	<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="num">Number:</label>
      <input type="number" class="form-control" id="num" placeholder="Enter number" name="number">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>

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

if(isset($_POST["name"]))
{
$name=$_POST["name"];
$email=$_POST["email"];
$number=$_POST["number"];

$sql="select name, email, number from forms where id=0";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
$na=$row["name"];
$em=$row["email"];
$nu=$row["number"];


echo "<table class='table table-striped'>";
if($na!=$name)
{
	strtolower($na);
	strtolower($name);
	
	if($na!=$name)
	{
		echo "<tr><td>Name</td><td style='color:Red'>Spelling mistake</td></tr>";
	}
	else
	{
		echo "<tr><td>Name</td><td style='color:yellow'>Capslock mistake</td></tr>";
	}
}
else
{
	echo "<tr><td>Name</td><td style='color:Green'>Matched</td></tr>";
}
if(strcmp($em, $email)==1)
{
	strtolower($em);
	strtolower($email);
	
	if(strcmp($em, $email)==1)
	{
		echo "<tr><td>Email</td><td style='color:red'>spelling mistake</td></tr>";
	}
	else
	{
		echo "<tr><td>Email</td><td style='color:yellow'>Capslock mistake</td></tr>";
	}
}
else{
	echo "<tr><td>Email</td><td style='color:green'>Matched</td></tr>";
}

if($nu==$number)
{
	echo "<tr><td>Number</td><td style='color:green'>Matched</td></tr>";
}
else
{
	echo "<tr><td>Number</td><td style='color:red'>Unmatched</td></tr>";
	
}
echo "</table>";
}


?>
