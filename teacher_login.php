<?php
    require_once('configure.php');

    // echo "Success connecting to the database";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="login.css">
	<link rel="icon" type="image/x-icon" href="photo/unilogo1.png">
	<title>Teacher Login</title>
	<!-- CSS -->
	<style>
		body {
			background-color: #a2ada1;
		}
	</style>
	
	<!-- Realtime from server with JS -->
    <script type="text/javascript">
        function display_c() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct()', refresh)
        }

        function display_ct() {
            var x = new Date()
            document.getElementById('ct').innerHTML = x;
            display_c();
        }
    </script>
</head>

<body onload=display_ct();>
	<header>
		<nav class="navbar navbar-light" style="background-color: #E7E0C9;">
			<div class="container">
				<a class="navbar-brand" href="admin_login.php">
					<img src="photo/admin.png" alt="" width="96" height="96" class="d-inline-block align-text-top">
					<p>&nbsp;&nbsp;&nbsp; Admin</p>
				</a>
				<a class="navbar-brand fw-bolder" href="teacher_login.php">
					<img src="photo/teacher.png" alt="" width="96" height="96" class="d-inline-block align-text-top">
					<p>&nbsp;&nbsp; Teacher</p>
				</a>
				<a class="navbar-brand" href="student_login.php">
					<img src="photo/student.png" alt="" width="96" height="96" class="d-inline-block align-text-top">
					<p>&nbsp;&nbsp; Student</p>
				</a>
				<a class="navbar-brand" href="index.php">
					<img src="photo/home.png" alt="" width="96" height="96" class="d-inline-block align-text-top">
					<p>&nbsp;&nbsp;&nbsp;&nbsp; Home</p>
				</a>
			</div>
		</nav>
	</header>

	<main>
		<p class="fw-bolder mt-4" style="text-align: center; font-size:40px;">Teacher Login</p>
		<div class="container border border-3 rounded rounded-3 p-5 mt-5 border-dark" style="background-color: #11324D;">
			<div class="fs-1 fw-bolderlogin">
				<h1 class="text-light" style="line-height: 60px;"> Login </h1>
			</div>
			<div class="login">
				<form action="teacher_login.php" method="post">
					<input type="text" name="username" id="username"
						class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
						style="height: 38px; width:48%;" placeholder="Username">
					<input type="password" name="password" id="password"
						class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light "
						style="height: 38px; width:48%;" placeholder="Password">
					<br><br>
					<input type="submit" value="Login" name="login" class="fs-6 fw-bold border-1 rounded-2 px-1"
						style="background-color: #6B7AA1; color: aliceblue;"><br><br>
				</form>
				<strong style="color: rgba(128, 255, 0, 0.644);">Current server time : </strong>
                <span class="text-white" id='ct'></span>
			</div>
		</div>
	</main>

	<!-- PHP code -->
	<?php
    session_start();
        if(isset($_POST['login']))
        {
            $Username = $_POST['username'];
            $password = $_POST['password'];

        $select = mysqli_query($con, "SELECT * FROM teacher_user WHERE id = '$Username'  AND teacherpass = '$password'");
        $row = mysqli_fetch_array($select);

        if(is_array($row))
        {
            $_SESSION['username'] = $row['id'];
            $_SESSION['password'] = $row['teacherpass'];
        }
        else{
            echo '<script>alert("Invalid Username or Password")</script>';
        }
        }
        if(isset($_SESSION['username'])){
            header("Location:teacher_profile.php");
        }
		$con->close();
    ?>

	<!-- Bootstrap script -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
</body>

</html>