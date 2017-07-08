<!DOCTYPE html>
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
.jumbotron {
    background-color: #f4511e; /* Orange */
    color: #ffffff;
}
article {
    margin-left: 350px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
nav {
    float: left;
    max-width: 160px;
    margin: 0;
    padding: 1em;
}

</style>
<div class="container">
<a class="navbar-brand" > <img src="final_logo-02.png" left="100" width="250" height="150"> </a>

  <div class="jumbotron">
    <h1 style="padding-left:250px;">Tutorial Sessions</h1>      
          
</div>

<!--
<div class="row">
  <div class="col-sm-4">
  <br><br><br>
  <h3>Welcome user,</h3>
  <br>
  <p style="text-align:center;">Go back to</p>
  <ul class="pager" padding-left="5%">
  <li class="previous"><a href="#">Previous</a></li>
  </ul>
  </div>
  <div class="col-sm-8"><h1 style="text-align:center;">Test 1</h1></div>
  </div>-->
  <nav>
  <h4>Welcome user,</h4><br>
  <p>Go back to</p>
  <ul class="pager" padding-left="10%">
  <li class="previous"><a href="#" data-toggle="tooltip" title="Go back to previous level!">Previous</a></li>
  
  </ul>
</nav>

<article>
  <div class="col-sm-8"><h1 style="text-align:center;">Test 3</h1>
  <form method="post" action=sel.php>
<select name="opt">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
  <input type="submit" name="submit" value="Submit"><br>
</select>
  </form>
  <?php
$value1="saab";
if(isset($_POST["opt"])){
  $value2=$_POST["opt"];
if($value2!=$value1)
{
    echo "Please select the correct button";
}
else{
  echo "Correct button!";
}}

?>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<br>
 <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
    40%
</article>
</body>
</html>
