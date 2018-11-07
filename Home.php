<?php
session_start(); 
$server="localhost";
$username="root";
$password="";
$db="football";
$_SESSION['logged'] = false;
$_SESSION['admin']=false;
$conn = mysqli_connect($server,$username,$password,$db);
if(!$conn){
    die("Connection failed".mysqli_connect_error());
}

ob_start();
if($_SESSION['logged']){
	$btnVal = 'Logout';
}else{
	$btnVal = 'Login';
}	
if(isset($_POST['email']))
{	$email = $_POST['email'];
	$password = $_POST['password'];

	$hash_pwd = hash('sha512',$password);
		
	$sql = "SELECT * FROM register WHERE email='$email' AND password='$hash_pwd'";
	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);

	$admin1="at344@gmail.com";
	if($email==$admin1 && $resultCheck>0) {
		$_SESSION['admin']=true;
		ob_end_flush();
	}	
	if($resultCheck>0)
				{
					echo "<script>alert('Login successful')</script>";
					$_SESSION['logged'] = true;
				}else{
					echo "<script>alert('Login not successful')</script>";
					$_SESSION['logged'] = false;
				}
			
}


if(isset($_POST['sub'])&& $_SESSION['logged']){
	$_SESSION['usrn'] = $email;

	// EDIT HERE

	// echo $_SESSION['usrn'];
}

if (isset($_POST['hello'])) {
    logout();
}

function logout() {
	$_SESSION = array();
	session_destroy();
	$_SESSION['logged']=false;
	// echo "Logged out";
	// header("Location: Home.php");
	// exit;
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

</head>
<body>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-xxl bg-dark navbar-color fixed-top" style="opacity: 0.5;">
		  <!-- Toggler/collapsibe Button -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		    <!-- <span class="navbar-toggler-icon"></span> -->
		    <i class="material-icons">view_headline</i>
		  </button>

		  <!-- Navbar links -->
		  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="#">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="Standings.php">Standings</a>
		      </li>
		      <?php
		      	$status=$_SESSION['logged'];
		      	if($status==true){
		      		echo "<li class='nav-item'>";
		      		echo "<a class='nav-link' href='Fantasy-League.php'>Fantasy League</a>";
		      		echo "</li>";
		      	}
		      ?>
		      <?php
		      	$check12 = $_SESSION['admin']; 
		      	if($check12==true){
		      		echo "<li class='nav-item'>";

		      		echo "<a class='nav-link' href='addplayer.php'>Add Player</a>";

		      		echo "</li>";
		      	}
		      ?>
		    </ul>
		  </div> 

		  <!-- Brand -->
		  <a class="navbar-brand mr-auto m-1" href="#">Football Fanatics</a>

		  <?php
		  $check1 = $_SESSION['logged'];
		  if($check1==true){
		  	echo "<a href='Home.php?hello=true'
		  	class='btn btn-secondary shadow ml-auto'>Logout</a>";
		  }
		  else{
		  	echo "<a href='' class='btn btn-secondary shadow ml-auto' data-toggle='modal' data-target='#loginModal'>Login</a>";
		  }
		  ?>

		</nav>
	
	     <div class="modal fade" id="loginModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					
						<h2>Login</h2>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<div class="modal-body">
						<form action="" method="POST">
							<div class="form-group">
								<label for="email">Email</label>
								<div class="input-group">
									<!-- <div class="input-group-append"> -->
										<input type="email" name="email"  id="email" class="form-control" placeholder="Email" required>
										
									<!-- </div> -->
								</div>
							</div>
							<div class="form-group">
								<label for="pwd">Password</label>
								<input type="Password" name="password" id="pwd" class="form-control" placeholder="Password" required>
							</div>
							<div class="form-group">
								<input type="checkbox" name="" id="rm">
								<label for="rm"><strong>Remember Me!</strong></label>
							</div>
							<input type="submit" class="btn btn-outline-secondary" name="sub" value="Submit">
							<input type="reset" name="" class="btn btn-outline-secondary ml-auto" value="Clear">
								
							<div class="container p-2">
								<div class="row">
									<div class="col-sm-6">
										<!-- <div>Don't have an account</div> -->
										<div>
											<a href="register.php">Register Here!</a>
										</div>
									</div>
									<div class="col-sm-6">
										<a href="#">Forgot Password</a>
									</div>
								</div>
							</div>     
						</form>
					</div>
				</div>
			</div>
		</div>
		
		
		

		<!-- Carousel -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">

		  <!-- Indicators -->
		  <ul class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		  </ul>

		  <!-- The slideshow -->
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="img/ronaldo.jpg" alt="Ronaldo">
		    </div>
		    <div class="carousel-item">
		      <img src="img/messi.jpg" alt="Messi">
		    </div>
		  </div>

		  <!-- Left and right controls -->
		  <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		  </a>

		</div>

		<!-- <img src="ronaldo.jpg" class="img-responsive temp" > -->

		<div class="container p-3">
			<h2>News Updates</h2>
			<!-- <hr style="border: 2px solid #000" -->
			<hr>
		</div>

		<!-- News Cards -->

		<div class="container p-4">
			<div class="row">
				<div class="col-sm-4">
					<!-- Card 1 -->
					<div class="card">
						<img src="img/s.jpg" alt="Some News" >
						<div class="card-body">
							<h3 class="card-title">News Story</h3>
							<p class="card-text">
								&Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quo fuga possimus reiciendis amet cupiditate totam, iusto perferendis est dolor optio, tempore obcaecati quidem velit. A voluptas sunt quia! Tempore.
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<!-- Card 1 -->
					<div class="card">
						<img src="img/t.jpg" alt="Some News">
						<div class="card-body">
							<h3 class="card-title">News Story</h3>
							<p class="card-text">
								&Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quo fuga possimus reiciendis amet cupiditate totam, iusto perferendis est dolor optio, tempore obcaecati quidem velit. A voluptas sunt quia! Tempore.
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<!-- Card 1 -->
					<div class="card">
						<img src="img/u.jpg" alt="Some News">
						<div class="card-body">
							<h3 class="card-title">News Story</h3>
							<p class="card-text">
								&Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quo fuga possimus reiciendis amet cupiditate totam, iusto perferendis est dolor optio, tempore obcaecati quidem velit. A voluptas sunt quia! Tempore.
							</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Team standings -->

		<div class="container p-3">
			<h2>Team Standings</h2>
			<!-- <hr style="border: 2px solid #000" -->
			<hr>
		</div>

		<div class="container p-4">
			<div class="d-flex flex-wrap justify-content-around">

				<!-- For now order is static, however order must be derived from javascript -->

				<div class="card temp order-5 p-2">
					<img src="img/a.png" alt="Comps">
					<div class="card-body">
						<h3 class="card-title">Comps<span class="badge badge-secondary">45</span></h3>
						<p class="card-text">
							&Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quo fuga possimus reiciendis amet cupiditate totam, iusto perferendis est dolor optio, tempore obcaecati quidem velit. A voluptas sunt quia! Tempore.
						</p>
					</div>
				</div>

				<div class="card temp order-1 p-2">
					<img src="img/c.png" alt="IT">
					<div class="card-body">
						<h3 class="card-title">IT<span class="badge badge-secondary">45</span></h3>
						<p class="card-text">
							&Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quo fuga possimus reiciendis amet cupiditate totam, iusto perferendis est dolor optio, tempore obcaecati quidem velit. A voluptas sunt quia! Tempore.
						</p>
					</div>
				</div>

				<div class="card temp order-4 p-2">
					<img src="img/d.png" alt="Mech">
					<div class="card-body">
						<h3 class="card-title">Mech<span class="badge badge-secondary">45</span></h3>
						<p class="card-text">
							&Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quo fuga possimus reiciendis amet cupiditate totam, iusto perferendis est dolor optio, tempore obcaecati quidem velit. A voluptas sunt quia! Tempore.
						</p>
					</div>
				</div>

				<div class="card temp order-2 p-2">
					<img src="img/e.png" alt="ETRX">
					<div class="card-body">
						<h3 class="card-title">ETRX<span class="badge badge-secondary">45</span></h3>
						<p class="card-text">
							&Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quo fuga possimus reiciendis amet cupiditate totam, iusto perferendis est dolor optio, tempore obcaecati quidem velit. A voluptas sunt quia! Tempore.
						</p>
					</div>
				</div>

				<div class="card temp order-3 p-2">
					<img src="img/b.png" alt="EXTC">
					<div class="card-body">
						<h3 class="card-title">EXTC<span class="badge badge-secondary">45</span></h3>
						<p class="card-text">
							&Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi quo fuga possimus reiciendis amet cupiditate totam, iusto perferendis est dolor optio, tempore obcaecati quidem velit. A voluptas sunt quia! Tempore.
						</p>
					</div>
				</div>

			</div>
		</div>

		<div class="sticky-bottom footer bg-secondary p-2">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h3 style="color: #fff">Team Members</h3>
						
						<ul>
							<li>Parshva H Barbhaya - 1611066</li>
							<li>Ruchi Bhatia - 1611067</li>
							<li>Dhruvil Jhaveri - 1611081</li>
						</ul>

					</div>

					<div class="col-sm-6">
						<h3 style="color: #fff">Under guidance</h3>
						<ul>
							<li>Uday Joshi</li>
							<li>Jyoti Joglekar</li>
							<li>Bharathi H N</li>
						</ul>
					</div>
				</div>
			</div>
		</div>


</body>
</html>