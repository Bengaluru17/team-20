<!DOCTYPE html>
<html>
<body>

<form method="post" action=rad.php>
  <input type="radio" name="gender" value="male" > Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
  <input type="radio" name="gender" value="other"> Other  
  <input type="submit" name="submit" value="Submit">
</form> 

<?php
$value1="male";
if(isset($_POST["gender"])){
  $value2=$_POST["gender"];
if($value2!=$value1)
{
    echo "Please select the correct button";
}
else{
  echo "Correct button!";
}}
?>
</body>
</html>
