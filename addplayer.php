<?php
session_start(); 
$server="localhost";
$username="root";
$password="";
$db="football";
$conn = mysqli_connect($server,$username,$password,$db);
if(!$conn){
    die("Connection failed".mysqli_connect_error());
}
else
{
	echo "";
}
?>
<?php

    if(isset($_POST['submit']))
	{
	$p_id = $_POST['p_id'];
	$kit_no = $_POST['kit_no'];
	$age = $_POST['age'];
	$name = $_POST['name'];
	$position = $_POST['position'];
	$goals = $_POST['goals'];
	$yellow_cards = $_POST['yellow_cards'];
	$red_cards = $_POST['red_cards'];
	$assists = $_POST['assists'];
	$team = $_POST['team'];

	$query = "INSERT INTO players(p_id,kit_no,age,name,position,goals,`yellow cards`,`red cards`,assists,team) values ('$p_id','$kit_no','$age','$name','$position','$goals','$yellow_cards','$red_cards','$assists','$team');";
	if(mysqli_query($conn,$query))
	{
			
				echo "<script>alert(' successful')</script>";
				$success=1;
				$_SESSION['success'] = $success;
			
	}
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>

  <!-- Bootstrap links -->

  <meta charset="utf-8">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <!-- Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- User defined link -->
  <link rel="stylesheet" type="text/css" href="Style/Home.css">

  <!-- Style file -->

  <style type="text/css">
    
    .nav-link {
    color: #ffffff;
  }

  .nav-item:hover {
    background-color: #000;
  }

  .nav-link:hover {
    color: #fff;
  }

  .navbar-brand {
    text-decoration: none;
    color: #fff;
  }

  .navbar-brand:hover {
    color: #fff;
  }

  .navbar-color {
    color: #000;
  }

  .material-icons{
    color: #fff;
  }

  </style>

</head>
<body>

    <nav class="navbar navbar-expand-xxl bg-dark navbar-color sticky-top" style="opacity: 0.5;">
      
      <a class="navbar-brand mr-auto m-1" href="#">Football Fanatics</a>

    </nav>
  
<div class="container p-5 height=30px align=center">       
<?php

$nameErr = $kit_noErr = $p_idErr = $ageErr = $positionErr=$goalsErr=$yellow_cardsErr=$red_cardsErr=$assistsErr=$teamErr= "";
$name = $kit_no = $p_id = $position=$goals=$yellow_cards=$red_cards=$assists = $age =$team= "";

?>


<div class="container">
  <div class="row">
    <div class="col-sm-6 offset-sm-3">
      <div class="card">
        <div class="card-title p-2">
          <h2 style="text-align: center;">Player!</h2>
        </div>
        <div class="card-text m-3">
          <form method="POST">
            <p><span class="error"><i style="color: red">* required field</i></span></p>
            <div class="form-group">
              <label for="p_id">P_ID</label>
              <span class="error" style="color: red">* <?php echo $p_idErr;?></span>
              <input type="text" name="p_id" value="<?php echo $p_id;?>" id="p_id" class="form-control">
              
            </div>

            <div class="form-group">
              <label for="kit_no">KIT_NO</label>
              <span class="error" style="color: red">* <?php echo $kit_noErr;?></span>
              <input type="text" name="kit_no" value="<?php echo $kit_no;?>" id="kit_no" class="form-control">
              
            </div>

            <div class="form-group">
              <label for="age">AGE</label>
              <span class="error" style="color: red"><?php echo $ageErr;?>*</span>
               <input type="age" name="age" value="<?php echo $age;?>" id="age" class="form-control">
              
            </div>
			
			<div class="form-group">
              <label for="name">NAME</label>
              <span class="error" style="color: red">* <?php echo $nameErr;?></span>
              <input type="text" name="name" value="<?php echo $name;?>" id="name" class="form-control">
              
            </div>
			
			<div class="form-group">
              <label for="position">POSITION</label>
              <span class="error" style="color: red">* <?php echo $positionErr;?></span>
              <input type="text" name="position" value="<?php echo $position;?>" id="position" class="form-control">
              
            </div>
			
			<div class="form-group">
              <label for="goals">GOALS</label>
              <span class="error" style="color: red">* <?php echo $goalsErr;?></span>
              <input type="text" name="goals" value="<?php echo $goals;?>" id="goals" class="form-control">
              
            </div>
			
			<div class="form-group">
              <label for="yellow cards">YELLOW CARDS</label>
              <span class="error" style="color: red">* <?php echo $yellow_cardsErr;?></span>
              <input type="text" name="yellow_cards" value="<?php echo $yellow_cards;?>" id="yellow_cards" class="form-control">
              
            </div>
			
			<div class="form-group">
              <label for="red cards">RED CARDS</label>
              <span class="error" style="color: red">* <?php echo $red_cardsErr;?></span>
              <input type="text" name="red_cards" value="<?php echo $red_cards;?>" id="red_cards" class="form-control">
              
            </div>
  
            <div class="form-group">
              <label for="assists">ASSISTS</label>
              <span class="error" style="color: red">* <?php echo $assistsErr;?></span>
              <input type="text" name="assists" value="<?php echo $assists;?>" id="assists" class="form-control">
              
            </div>
			
			<div class="form-group">
              <label for="team">TEAM</label>
              <span class="error" style="color: red">* <?php echo $teamErr;?></span>
              <input type="text" name="team" value="<?php echo $team;?>" id="team" class="form-control">
              
            </div>


              <input type="submit" name="submit" value="Insert" class="btn btn-outline-success">

              <input type="reset" name="reset" value="Clear" class="btn btn-outline-secondary">

              <a href="Home.php" class="btn btn-outline-secondary" role="button">Back to Home</a>
             
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
      

</div>
</body>
</html>