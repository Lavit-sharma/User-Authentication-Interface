<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
   <div class="card mb-3 center-div" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="user.jpeg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Hello, <?php echo $user_data['user_name']; ?></h5>
        <p class="card-text">Your  succesfull login with password: <?php echo $user_data['password']; ?> </p>
        <p class="card-text"><button type="button" class="btn btn-primary "><a href="logout.php" class="text-light">Logout</a>
		</button>
		</p>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
