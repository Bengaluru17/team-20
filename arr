
<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<?php

?>
<form method="post" action=comp1.php>  
  Name: <input type="text" name="email">
  <input type="submit" name="submit" value="Submit">
</form>
<?php

session_start();
$email=["ah","sd","sdg","sdd","kj","iurey","kjh","jhs","kuwe","wkh"];
for(int i=0;i<11;i++){
if(isset($_POST["email[i]"]))
{
  $em=$_SESSION["ran"];
  echo $em;
if($_POST["email[i]"]=="")
{
  echo "fill";  
}
else{
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
else{
 echo "<span style='color:red'>matched</span>";
}
}}

$_SESSION["ran"]=random();
echo $_SESSION["ran"];

?>



</body>
</html>




