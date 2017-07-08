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
	<h2 style="text-align:center">Level 1</h1>
	<?php
		$em2=generateRandomString();
		echo "<h3 style='text-align:center'>Input the given Name</h3>";
		echo "<h3 style='text-align:center;color:red'>".$em2."</h3>";
	?>
	<article>
		<form method="post" action="front2.php">  
			<div class="form-group">
				<label for="na">Name:</label>
				<input type="text" class="form-control" id="name" placeholder="Enter name" name="email"><br><br>
				<input type="submit">
			</div>
		</form>
		
		<?php
		
		
		if(isset($_POST["email"]))
		{		
			$em=$_SESSION["ran"];
				if($_POST["email"]=="")
				{
					echo "fill";  
				}
			else
			{
				$email=$_POST["email"];

				if($em!=$email)
				{
					$em=strtolower($em);
					$email=strtolower($email);
	
					if($em!=$email)
					{
						$error="<span style='color:red'>spelling mistake</span>";
					}
					else
					{
						$error= "<span style='color:blue'>Capslock mistake</span>";
					}
				}
				else
				{
						$error= "<span style='color:green'>matched</span>";
				}
			}
		}
		
		$_SESSION["ran"]=$em2;
		
		
		
		

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
<a href="front3.php">
		<button type="button" class="btn btn-primary btn-block">Level 2</button>	
	</a>	
</div>
<div class="col-md-3">
	<h2 style="color:red; text-align:center">STATUS</h2>
	<?php
		if(isset($_POST["email"]))
		{	echo "<h3 style='text-align:center'>".$error."</h3>";	}
	
	?>
	
</div>
</body>
</html>
