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

<!DOCTYPE html>
<html>
<head>
	<title>Standings</title>

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
  <link rel="stylesheet" type="text/css" href="Style/Standings.css">
</head>
<body>

	<!-- Navbar -->
		<div class="sticky-top">
			<nav class="navbar navbar-expand-xxl bg-dark navbar-color">
			  <!-- Toggler/collapsibe Button -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			    <!-- <span class="navbar-toggler-icon"></span> -->
			    <i class="material-icons">view_headline</i>
			  </button>

			  <!-- Navbar links -->
			  <div class="collapse navbar-collapse" id="collapsibleNavbar">
			    <ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link" href="Home.php">Home</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Standings</a>
			      </li>
			      <li class="nav-item">
		        	<a class="nav-link" href="Fantasy-League.php">Fantasy League</a>
		      	</li>
			    </ul>
			  </div> 

			  <!-- Brand -->
			  <a class="navbar-brand mr-auto m-1" href="#">Football Fanatics</a>

			  <!-- <button type="link" class="btn btn-secondary shadow ml-auto" data-toggle="modal" data-target="#loginModal">Login</button> -->

			</nav>
			<nav class="navbar navbar-expand-sm bg-dark navbar-color">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="#table" class="nav-link">Ranking</a>
					</li>

					<li class="nav-item">
						<a href="#schedule" class="nav-link">Schedule</a>
					</li>
				</ul>
			</nav>
				
		</div>
		

		<div class="modal fade" id="loginModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>Login</h2>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<div class="modal-body">
						<form action="" method="post">
							<div class="form-group">
								<label for="email">Email</label>
								<div class="input-group">
									<div class="input-group-append">
										<input type="email" name="" placeholder="xyz@example.in" id="email" class="form-control" required>
										<div class="input-group-text">
											<span>@example.com</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="pwd">Password</label>
								<input type="Password" name="" id="pwd" class="form-control" placeholder="Password" required>
							</div>
							<div class="form-group">
								<input type="checkbox" name="" id="rm">
								<label for="rm"><strong>Remember Me!</strong></label>
							</div>
							<input type="submit" class="btn btn-outline-secondary" name="" value="Submit">
							<input type="reset" name="" class="btn btn-outline-secondary ml-auto" value="Clear">
								
							<div class="container p-2">
								<div class="row">
									<div class="col-sm-6">
										<!-- <div>Don't have an account</div> -->
										<div>
											<a href="#">Register Here!</a>
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

	<!-- Standings -->
		<div class="container p-2" id="table">
			<h2>Rankings</h2>
			<hr>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Position</th>
						<th>Team</th>
						<th>Points</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>IT</td>
						<td>[something]</td>
					</tr>

					<tr>
						<td>2</td>
						<td>ETRX</td>
						<td>[something]</td>
					</tr>

					<tr>
						<td>3</td>
						<td>Mech</td>
						<td>[something]</td>
					</tr>

					<tr>
						<td>4</td>
						<td>EXTC</td>
						<td>[something]</td>
					</tr>

					<tr>
						<td>5</td>
						<td>Comps</td>
						<td>[something]</td>
					</tr>
				</tbody>
			</table>
		</div>

	<!-- Schedule -->
		<div class="container">
			<h2 id="schedule">Schedule</h2>
			<hr>

			<div class="p-2"></div>

			<div class="row">
				<div class="col-sm-10 offset-sm-1">
					<div class="border shadow p-3">
						<div class="d-flex justify-content-around">
							<div><h2>Team 1</h2></div>
							<div>
								<img src="" alt="Team 1" class="img-thumbnail img-responsive">
							</div>
							<div><h2>VS</h2></div>
							<div><h2>Team 2</h2></div>
							<div>
								<img src="" alt="Team 2" class="img-thumbnail img-responsive">
							</div>
						</div>
						<div class="d-flex flex-column pb-2">
							<div class="align-self-center">Score1 : Score 2</div>
							<div class="align-self-center">Match Time: TBD</div>
							<div class="align-self-center">Match Day: TBD</div>
						</div>
					</div>
				</div>
			</div>

			<div class="p-4"></div>

			<div class="row">
				<div class="col-sm-10 offset-sm-1">
					<div class="border shadow p-3">
						<div class="d-flex justify-content-around">
							<div><h2>Team 1</h2></div>
							<div>
								<img src="" alt="Team 1" class="img-thumbnail img-responsive">
							</div>
							<div><h2>VS</h2></div>
							<div><h2>Team 2</h2></div>
							<div>
								<img src="" alt="Team 2" class="img-thumbnail img-responsive">
							</div>
						</div>
						<div class="d-flex flex-column pb-2">
							<div class="align-self-center">Score1 : Score 2</div>
							<div class="align-self-center">Match Time: TBD</div>
							<div class="align-self-center">Match Day: TBD</div>
						</div>
					</div>
				</div>
			</div>

			<div class="p-4"></div>

			<div class="row">
				<div class="col-sm-10 offset-sm-1">
					<div class="border shadow p-3">
						<div class="d-flex justify-content-around">
							<div><h2>Team 1</h2></div>
							<div>
								<img src="" alt="Team 1" class="img-thumbnail img-responsive">
							</div>
							<div><h2>VS</h2></div>
							<div><h2>Team 2</h2></div>
							<div>
								<img src="" alt="Team 2" class="img-thumbnail img-responsive">
							</div>
						</div>
						<div class="d-flex flex-column pb-2">
							<div class="align-self-center">Score1 : Score 2</div>
							<div class="align-self-center">Match Time: TBD</div>
							<div class="align-self-center">Match Day: TBD</div>
						</div>
					</div>
				</div>
			</div>

			<div class="p-4"></div>

		</div>

	<!-- Footer -->
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