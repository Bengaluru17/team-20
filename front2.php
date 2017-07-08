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
</div>
<div class="col-md-4">
	<article>
		<form method="post" action="front2.php">  
			<div class="form-group">
				<label for="na">Name:</label>
				<input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
			</div>
		</form>
		
		<?php
			$email=["ah","sd","sdg","sdd","kj","iurey","kjh","jhs","kuwe","wkh"];
		
		
		if(isset($_POST["email[i]"]))
		{
				$em=$_SESSION["ran"];
  
				if($_POST["email[i]"]=="")
				{
					echo "fill";  
				}
			else
			{
				$email=$_POST["email[i]"];
				echo $email;

				if(strcmp($em, $email[i])==1)
				{
					strtolower($em);
					strtolower($email);
	
					if(strcmp($em, $email[i])==1)
					{
						echo "<span style='color:green'>spelling mistake</span>";
					}
					else
					{
						echo "capslock mistake";
					}
				}
				else
				{
						echo "<span style='color:red'>matched</span>";
				}
			}
		}	

$_SESSION["ran"]=random();
echo $_SESSION["ran"];

?>

	</article>
</div>
</body>
</html>
