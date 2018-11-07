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

if(isset($_POST['addPlayer']))
{	$searchVal = $_POST['searchBar'];
	
	
	$sql1 = "SELECT p_id FROM players WHERE name='$searchVal' ";
	$result1=mysqli_query($conn,$sql1);
	$row = mysqli_fetch_assoc ($result1);
		
	$resultCheck1=mysqli_num_rows($result1);
	
	if($resultCheck1>0 )
				{
					$p_id=$row['p_id'];
					$email_from_home=$_SESSION['usrn'];
					// echo $email_from_home;
					$sql2 = "INSERT INTO dream_team (email,pid,points) values ('$email_from_home','$p_id',RAND()*10)" ;
					$result2=mysqli_query($conn,$sql2);
					// echo "Player added";
					
					
				}else{
					echo "<script>alert('Query unresolved, Try again');</script>";
				}
				unset($result);			
}

if(isset($_POST['rmPlayer'])) {
	$searchVal = $_POST['searchBar'];


	$sql5="DELETE FROM dream_team
			WHERE pid = (
				SELECT p_id
			    FROM players
			    WHERE name = '$searchVal')";
	$result5=mysqli_query($conn, $sql5);
	$resultCheck5 = mysqli_num_rows($result5);
	if($resultCheck5 > 0) {
		echo "<script>alert('Player successfully removed');</script>";
	}
	else {
		echo "<script>alert('No such Player exists');</script>";	
	}
}

if($_SESSION['usrn']!=''){

	$your_team = array();

	$temp = $_SESSION['usrn'];

	$sql3 = "SELECT p.name FROM players p JOIN dream_team d
				WHERE p.p_id = d.pid ";
	$result3=mysqli_query($conn,$sql3);
	
	if(mysqli_num_rows($result3) <= 0) {
		echo "<script>alert('No Team Created');</script>";
	}
	else {
		while($row = mysqli_fetch_assoc($result3)) {
			$your_team[] = $row;
		}
	}

}

$sql4 = "SELECT name, position, goals, assists, `yellow cards`, `red cards` FROM players";
$records = mysqli_query($conn, $sql4);
if (!$records) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Fantasy League</title>

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
		<nav class="navbar navbar-expand-xxl bg-dark navbar-color sticky-top" style="opacity: 0.5;">
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
		        <a class="nav-link" href="Standings.php">Standings</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Fantasy League</a>
		      </li> 
		    </ul>
		  </div> 

		  <!-- Brand -->
		  <a class="navbar-brand mr-auto m-1" href="#">Football Fanatics</a>

		  <div class="ml-auto">
		  	<button type="link" class="btn btn-secondary shadow "
				data-toggle="modal" data-target="#RulesModal">
					Rules</button>

			<button type="link" class="btn btn-secondary shadow "
			data-toggle="modal" data-target="#HowToModal">
				How To</button>

		  	<!-- <button type="link" class="btn btn-secondary shadow " data-toggle="modal" data-target="#loginModal">Login</button> -->
		  </div>

		</nav>

		<div class="modal fade" id="RulesModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					
						<h2><i>Rules</i></h2>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<div class="modal-body">
						<h2>About Team Creation</h2>
						<hr>
						<p>&Lorem ipsum dolor sit amet, consectetur adipisicing elit. At non enim nihil repudiandae architecto ipsam, quisquam harum similique neque itaque numquam sit temporibus, fugit quo provident ea assumenda, quas consectetur?</p>
						<p>&Lorem ipsum dolor sit amet, consectetur adipisicing elit. At non enim nihil repudiandae architecto ipsam, quisquam harum similique neque itaque numquam sit temporibus, fugit quo provident ea assumenda, quas consectetur?</p>
						<p>&Lorem ipsum dolor sit amet, consectetur adipisicing elit. At non enim nihil repudiandae architecto ipsam, quisquam harum similique neque itaque numquam sit temporibus, fugit quo provident ea assumenda, quas consectetur?</p>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="HowToModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					
						<h2><i>How To</i></h2>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<div class="modal-body">
						
						<p>&Lorem ipsum dolor sit amet, consectetur adipisicing elit. At non enim nihil repudiandae architecto ipsam, quisquam harum similique neque itaque numquam sit temporibus, fugit quo provident ea assumenda, quas consectetur?</p>
						<p>&Lorem ipsum dolor sit amet, consectetur adipisicing elit. At non enim nihil repudiandae architecto ipsam, quisquam harum similique neque itaque numquam sit temporibus, fugit quo provident ea assumenda, quas consectetur?</p>
						<p>&Lorem ipsum dolor sit amet, consectetur adipisicing elit. At non enim nihil repudiandae architecto ipsam, quisquam harum similique neque itaque numquam sit temporibus, fugit quo provident ea assumenda, quas consectetur?</p>
					</div>
				</div>
			</div>
		</div>

	<!-- Body -->
	<div class="container p-5">
		<div class="row">
			<div class="col-lg-5 border border-left-0 border-top-0 border-bottom-0">
				<h2>My Team</h2>
				<div class="container p-3">
					<div class="row">
						<div class="col-sm-10 offset-sm-1 teamDisplay" >
							<p>&Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nisi cumque, doloribus consequatur commodi deserunt odio ea tempora quas. Quibusdam iusto ullam officia harum nesciunt illo, recusandae voluptatum, ipsa voluptates!</p>

							<h2>Your Team:</h2>
							<ul class="list-group">
							<?php
								foreach ($your_team as $item) {
									foreach ($item as $player) {

										echo "<li class='list-group-item'>$player</li>";

									}
								}
							?>
						</ul>
						<?php
							$tp = $_SESSION['usrn'];
							$sql6 = "SELECT SUM(points) 
								FROM dream_team WHERE
								email = '$tp'";
							$result6=mysqli_query($conn, $sql6);
							if(mysqli_num_rows($result6)>0) {
								$row6=mysqli_fetch_array ($result6);
								// print_r($row6);
								echo "<h2>Your score: <strong> ".$row6['0']."</strong></h2>";
							}

						?>

						</div>	
					</div>
				</div>

				<div class="m-2">
					<form action="#" method="POST">
						<input type="text" placeholder="Search.." name="searchBar" required class="form-control m-1">

						<button class="btn btn-outline-success" name="addPlayer" type="submit">Add Player</button>

						<button class="btn btn-outline-danger" name="rmPlayer" type="submit">Remove Player</button>
						
						<button class="btn btn-outline-secondary m-2">Clear</button>
					</form>
				</div>

				<div class="m-1 collapse" id="searchBar">
					<form class="form-inline">
						<input type="text" placeholder="Search.." name="" required class="form-control m-1">
						<button class="btn btn-outline-success" type="submit">Search</button>
					</form>
				</div>

			</div>
			<div class="col-lg-7">
				<h2>Table of players</h2>
				<table class="table table-hover table-responsive"
					style="height: 500px;">
					<thead>
						<tr>
							<th>Player name</th>
							<th>Position</th>	
							<th>Goals</th>
							<th>Assists</th>
							<th>Yellow Cards</th>
							<th>Red cards</th>
						</tr>
					</thead>
					<tbody>
						<!-- <tr> -->
							<?php
							while($players = mysqli_fetch_array($records)){
								echo "<tr>";
								echo "<td>'".$players['name']."'</td>";
								echo "<td>'".$players['position']."'</td>";
								echo "<td>'".$players['goals']."'</td>";
								echo "<td>'".$players['assists']."'</td>";
								echo "<td>'".$players['yellow cards']."'</td>";
								echo "<td>'".$players['red cards']."'</td>";
								echo "</tr>";
							}
							?>
					</tbody>
				</table>
			</div>
		</div>
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