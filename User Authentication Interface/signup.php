<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//data was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h1 class="fw-bold text-center display-4">User Authentication Interface</h1>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
<div class="card" style="width: 25rem; border: 1px solid black;">
  <img src="user1.png" class="card-img-top" alt="...">
  <div class="card-body">
  <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fw-bold" >Username</label>
    <input class="form-control" id="text" type="text" name="user_name">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label fw-bold">Password</label>
    <input class="form-control" id="text" type="password" name="password" >
  </div>
  <button  class="btn btn-primary" id="button" type="submit" value="Signup">Sign Up</button><br><br>
  <a href="login.php">Click to Login</a><br><br>
</form>
  </div>
</div>
</div>
</body>
</html>