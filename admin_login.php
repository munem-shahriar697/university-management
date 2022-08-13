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
    <link rel="icon" type="image/x-icon" href="photo/unilogo1.png">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <style>
        body {
            background-color: #C69B7B;
        }
    </style>
    <title>Admin Login</title>
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
        <nav class="navbar navbar-light" style="background-color: #fcd4b5;">
            <div class="container">
                <a class="navbar-brand fw-bolder" href="admin_login.php">
                    <img src="photo/admin.png" alt="" width="96" height="96" class="d-inline-block align-text-top">
                    <p>&nbsp;&nbsp;&nbsp; Admin</p>
                </a>
                <a class="navbar-brand" href="teacher_login.php">
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
        <p class="fw-bolder mt-4" style="text-align: center; font-size:40px;">Admin Login</p>
        <div class="container border border-3 rounded rounded-3 p-5 mt-5 border-dark"
            style="background-color: #3A3845;">
            <div class="fs-1 fw-bolderlogin">
                <h1 class="text-light" style="line-height: 60px;"> Login </h1>
            </div>
            <div class="login">
                <form action="admin_login.php" method="post">
                    <input type="text" name="username" id="username"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:48%;" placeholder="Username">

                    <input type="password" name="password" id="password"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light "
                        style="height: 38px; width:48%;" placeholder="Password">

                    <br><br>
                    <input type="submit" value="Login" name="login" class="fs-6 fw-bold border-1 rounded-2 px-1 button"
                        style="background-color: #826F66; color: white;"><br><br>
                </form>
                <strong style="color: rgba(128, 255, 0, 0.644);">Current server time : </strong>
                <span class="text-white" id='ct'></span>
            </div>
        </div>
    </main>

    <!-- PHP code -->
    <?php
    session_start();
        // cheking if button is clicked if clicked then these id and pass checks will happen
        if(isset($_POST['login']))
        {
            //taking username and password from the input boxes
            $Username = $_POST['username'];
            $password = $_POST['password'];
        
        //loading data from the db table "admin_user"
        $select = mysqli_query($con, "SELECT * FROM admin_user WHERE adminuser = '$Username'  AND adminpass = '$password'");
        $row = mysqli_fetch_array($select);

        //checking if the array has any data in it
        if(is_array($row))
        {
            //matching the data taken from table and inputbox
            $_SESSION['username'] = $row['adminuser'];
            $_SESSION['password'] = $row['adminpass'];
        }
        else{
            echo '<script>alert("Invalid Username or Password")</script>';
        }
        }
        //will redirect user to the admin profile page if the data is matched
        if(isset($_SESSION['username'])){
            header("Location:admin_profile.php");
        }
        $con->close();
    ?>


    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="admin_login.js"></script>
</body>

</html>