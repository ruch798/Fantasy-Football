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
	// echo "connection successful";
}
?>
<?php

if(isset($_POST['email']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
  $flag=0;
	
	$hash_pwd = hash('sha512',$password);

	$query = "INSERT INTO register(Name,Email,Password) values ('$name','$email','$hash_pwd')";
	if(mysqli_query($conn,$query))
	{
		$flag = 1;
	}

	if($flag == 1)
	{

		$query = "SELECT name from register where Email = '$email'";
		$result = mysqli_query($conn,$query);
		if($result);
		{
		$row =mysqli_fetch_assoc($result);
		}

		if(mysqli_query($conn,$query))
			{
				echo "<script>alert('Registration successful')</script>";
				$success=1;
				$_SESSION['success'] = $success;
			}
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

  <script type="text/javascript">
    


  </script>

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-xxl bg-dark navbar-color sticky-top" style="opacity: 0.5;">
      
      <a class="navbar-brand mr-auto m-1" href="#">Football Fanatics</a>

    </nav>
  
<div class="container p-5 height=30px align=center">       
<?php

$nameErr = $emailErr = $genderErr = $passwordErr = "";
$name = $email = $gender = $comment = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);

    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["password"])) {
    $password = "";
  } else {
    $password = test_input($_POST["password"]);
    
    if (strlen($password)<6) {
      $passwordErr = "Password length should be more than 6"; 
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="container">
  <div class="row">
    <div class="col-sm-6 offset-sm-3">
      <div class="card">
        <div class="card-title p-2">
          <h2 style="text-align: center;" class="mt-3">Register!</h2>
        </div>
        <div class="card-text m-3">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p><span class="error"><i style="color: red">* required field</i></span></p>
            <div class="form-group">
              <label for="name">Name</label>
              <span class="error" style="color: red">* <?php echo $nameErr;?></span>
              <input type="text" name="name" value="<?php echo $name;?>" id="name" class="form-control" required>
              
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <span class="error" style="color: red">* <?php echo $emailErr;?></span>
              <input type="text" name="email" value="<?php echo $email;?>" id="email" class="form-control" required>
              
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <span class="error" style="color: red"><?php echo $passwordErr;?>*</span>
               <input type="password" name="password" value="<?php echo $password;?>" id="password" class="form-control" required>
              
            </div>

              <input type="submit" name="submit" value="Submit" class="btn btn-outline-success">

              <input type="reset" name="reset" value="Clear" class="btn btn-outline-secondary">

              <a href="Home.php" class="btn btn-outline-secondary" role="button">Back to Home</a>

              <!-- <input type="button" name="logout" value="Logout" class="btn btn-outline-danger"> -->
             
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
      

</div>
</body>
</html>