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

<div style="margin-right:500px;margin-left:400px">
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
	<div class="radio">Gender:&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="gender" value="male">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="gender" value="female">Female</label>
	</div>
    <div class="form-group">
		<label for="addr">Address:</label>
		<input type="text" class="form-control" id="street" placeholder="Enter street" name="street"></br>
		<input type="text" class="form-control" id="street" placeholder="Enter locality" name="locality"></br>
		<input type="text" class="form-control" id="street" placeholder="Enter city" name="city"></br>	  
	 </div>
	
	<div class="form-group">
		<label for="sel1">State:</label>
		<select class="form-control" id="sel1" name="State">
			<option value="rajasthan">Rajasthan</option>
			<option value="uttar Pradesh">Uttar Pradesh</option>
			<option value="karnataka">Karnataka</option>
			<option value="tamil Nadu">Tamil Nadu</option>
		</select>
	</div>
	
	<div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" id="dat" name="date">
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
	$gender=$_POST["gender"];
	$street=$_POST["street"];
	$locality=$_POST["locality"];
	$city=$_POST["city"];
	$state=$_POST["State"];
	$dob=explode("-", $_POST["date"]);
	

	$sql="select name, email, number, gender, street, locality, city, state, date from forms where id=0";
	$result = mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
	
	$na=$row["name"];
	$em=$row["email"];
	$nu=$row["number"];
	$gen=$row["gender"];
	$st=$row["street"];
	$lo=$row["locality"];
	$ci=$row["city"];
	$st=$row["state"];
	$do=explode("-",$row["date"]);
	
	echo "<h1 style='color:red; text-align:center'>STATUS</h1>";
	echo "<table class='table table-striped' style='float:right'>";

		if($na!=$name)
		{
			$na=strtolower($na);
			$name=strtolower($name);
	
	
			if($na!=$name)
			{
				echo "<tr><td>Name</td><td style='color:Red'>Spelling mistake</td></tr>";
			}
			else
			{
			echo "<tr><td>Name</td><td style='color:blue'>Capslock mistake</td></tr>";
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
				echo "<tr><td>Email</td><td style='color:blue'>Capslock mistake</td></tr>";
			}
		}

		else
		{
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


		if($gen==$gender)
		{
			echo "<tr><td>Gender</td><td style='color:green'>Matched</td></tr>";
		}
		else
		{
			echo "<tr><td>Gender</td><td style='color:red'>Unmatched</td></tr>";
		}

		if($st!=$street)
		{
			$st=strtolower($st);
			$street=strtolower($street);
	
	
			if($st!=$street)
			{
				echo "<tr><td>Block</td><td style='color:Red'>Spelling mistake</td></tr>";
			}
			else
			{
			echo "<tr><td>Block</td><td style='color:blue'>Capslock mistake</td></tr>";
			}
		}
		else
		{
			echo "<tr><td>Block</td><td style='color:Green'>Matched</td></tr>";
		}
		
		if($lo!=$locality)
		{
			$lo=strtolower($lo);
			$locality=strtolower($locality);
	
	
			if($lo!=$locality)
			{
				echo "<tr><td>Locality</td><td style='color:Red'>Spelling mistake</td></tr>";
			}
			else
			{
			echo "<tr><td>Locality</td><td style='color:blue'>Capslock mistake</td></tr>";
			}
		}
		else
		{
			echo "<tr><td>Locality</td><td style='color:Green'>Matched</td></tr>";
		}
		
		if($ci!=$city)
		{
			$ci=strtolower($ci);
			$city=strtolower($city);
	
	
			if($ci!=$city)
			{
				echo "<tr><td>City</td><td style='color:Red'>Spelling mistake</td></tr>";
			}
			else
			{
			echo "<tr><td>City</td><td style='color:blue'>Capslock mistake</td></tr>";
			}
		}
		else
		{
			echo "<tr><td>City</td><td style='color:Green'>Matched</td></tr>";
		}
		echo $st;
		
		if($st!=$state)
		{
			echo "<tr><td>State</td><td style='color:red'>Select right option</td></tr>";
		}
		else
		{
			echo "<tr><td>State</td><td style='color:Green'>Matched</td></tr>";
		}
		
		if($do[0]!=$dob[0])
		{
			echo "<tr><td>Date</td><td style='color:Blue'>Year is wrong</td></tr>";
		}
		else if($do[1]!=$dob[1])
		{
			echo "<tr><td>Date</td><td style='color:Blue'>Month is wrong</td></tr>";
		}
		else if($do[2]!=$dob[2])
		{
			echo "<tr><td>Date</td><td style='color:Blue'>Day is wrong</td></tr>";
		}
		else
		{
			echo "<tr><td>Date</td><td style='color:Green'>Matched</td></tr>";
		}
		
	echo "</table>";
}


?>
