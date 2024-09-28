<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Please Enter Correct Credentials!";
		}else
		{
			echo "Please Enter Correct Credentials!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
  <button  class="btn btn-primary" id="button" type="submit" value="Login">Login</button><br><br>
  <a href="signup.php">Click to Signup</a><br><br>
</form>
  </div>
</div>
</div>

</body>
</html>
