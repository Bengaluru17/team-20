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
$sql="UPDATE levels SET level1=$t WHERE id=1";
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
<div class="col-md-4" style="border-left: 1px solid  #f4511e; padding-left:20px">
	<h2 style="text-align:center">Level 1</h1>
	
	<article>
		<form method="post" action="front2.php">  
			
			<div class="form-group">
				<?php
				$e1=generateRandomString();
				echo "<h3 style='text-align:center'>Q1. Input the given Name</h3>";
				echo "<h3 style='text-align:center;color:red'>".$e1."</h3>";
				?>
				<label for="na">Name:</label>
				<input type="text" class="form-control" id="name" placeholder="Enter name" name="email1"><br><br>
				
			</div>
			
			<div class="form-group">
				<?php
				$e2=generateRandomString();
				echo "<h3 style='text-align:center'>Q2. Input the given Name</h3>";
				echo "<h3 style='text-align:center;color:red'>".$e2."</h3>";
				?>
				<label for="na">Name:</label>
				<input type="text" class="form-control" id="name" placeholder="Enter name" name="email2"><br><br>
				
			</div>
			
			<div class="form-group">
				<?php
				$e3=generateRandomString();
				echo "<h3 style='text-align:center'>Q3. Input the given Name</h3>";
				echo "<h3 style='text-align:center;color:red'>".$e3."</h3>";
				?>
				<label for="na">Name:</label>
				<input type="text" class="form-control" id="name" placeholder="Enter name" name="email3"><br><br>
				
			</div>
			
			<input type="submit">
		</form>
		
		<?php
		
		$value=0;
		if(isset($_POST["email1"]))
		{		
			$em1=$_SESSION["ran1"];
				if($_POST["email1"]=="")
				{
					echo "fill";  
				}
			else
			{
				$email1=$_POST["email1"];

				if($em1!=$email1)
				{
					$em1=strtolower($em1);
					$email1=strtolower($email1);
	
					if($em1!=$email1)
					{
						$error1="<span style='color:red'>spelling mistake</span>";
					}
					else
					{
						$error1= "<span style='color:blue'>Capslock mistake</span>";
					}
				}
				else
				{
						$error1= "<span style='color:green'>matched</span>";
						$value=$value+1;
				}
			}
		}
		
		$_SESSION["ran1"]=$e1;
		
		
		
		
		if(isset($_POST["email2"]))
		{		
			$em2=$_SESSION["ran2"];
				if($_POST["email2"]=="")
				{
					echo "fill";  
				}
			else
			{
				$email2=$_POST["email2"];

				if($em2!=$email2)
				{
					$em2=strtolower($em2);
					$email2=strtolower($email2);
	
					if($em2!=$email2)
					{
						$error2="<span style='color:red'>spelling mistake</span>";
					}
					else
					{
						$error2= "<span style='color:blue'>Capslock mistake</span>";
					}
				}
				else
				{
						$error2= "<span style='color:green'>matched</span>";
						$value=$value+1;
				}
			}
		}
		
		$_SESSION["ran2"]=$e2;
		
		
		
		if(isset($_POST["email3"]))
		{		
			$em3=$_SESSION["ran3"];
				if($_POST["email3"]=="")
				{
					echo "fill";  
				}
			else
			{
				$email3=$_POST["email3"];

				if($em3!=$email3)
				{
					$em3=strtolower($em3);
					$email3=strtolower($email3);
	
					if($em3!=$email3)
					{
						$error3="<span style='color:red'>spelling mistake</span>";
					}
					else
					{
						$error3= "<span style='color:blue'>Capslock mistake</span>";
					}
				}
				else
				{
						$error3= "<span style='color:green'>matched</span>";
						$value=$value+1;
				}
			}
		}
		
		$_SESSION["ran3"]=$e3;

function generateRandomString($length = 5) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}		


?>


	</article>
	<br><br><br>
<?php
if($value>2)
{	echo "<a href='front3.php'>
		<button type='button' class='btn btn-primary btn-block'>Level 2</button>	
	</a>";	
}
?>
</div>
<div class="col-md-3">
	<h2 style="color:red; text-align:center">STATUS</h2>
	<?php
		if(isset($_POST["email1"]))
		{	echo "<h3 style='text-align:center'>Q1. ".$error1."</h3>";
			echo "<h3 style='text-align:center'>Q2. ".$error2."</h3>";	
			echo "<h3 style='text-align:center'>Q3. ".$error3."</h3>";	
	}
	
	?>
	
</div>
</body>
</html>
