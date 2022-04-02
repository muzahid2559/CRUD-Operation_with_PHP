<?php
include_once("config.php");
include_once("function.php");

check_login_user();

$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" style="margin-top:20px;">
		<div class="jumbotron">
      <h1 style="text-align:center;">PHP CRUD</h1>
			<p>The code written by Md. Muzahidul Islam with html, css, boostrap, php and mysql with responsive design</p>
		</div>

		<?php 
		
			if(isset($_SESSION["add"])){
				echo $_SESSION["add"];
				unset($_SESSION["add"]);
			}

			if(isset($_SESSION["update"])){
				echo $_SESSION["update"];
				unset($_SESSION["update"]);
			}
		
		
		?>
		<br>


  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
		<th>Department</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
			<?php
			while($res = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td class='bg-danger'>".$res['name']."</td>";
				echo "<td>".$res['age']."</td>";
				echo "<td>".$res['email']."</td>";
				echo "<td>".$res['dept']."</td>";
				echo "<td><a href=\"details.php?id=$res[id]\">Details</a> | <a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></tr>";
			}
			?>
    </tbody>
  </table>
	<a href="add.php" class="btn btn-info" role="button" style="float:right;">Add New</a>
  <a href="logout.php" class="btn btn-info" role="button" style="float:right; margin-right: 10px;">Log Out</a>
</div>
</body>
</html>
