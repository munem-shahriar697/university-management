<!-- connecting to db and starting of a session -->
<?php
    session_start();
    require_once('configure.php');
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
    <!-- CSS-->
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="photo/unilogo1.png">
    <title>Home</title>
    <style>
        body {
            background-color: #789395;
        }
    </style>
</head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-light" style="background-color: #E5E3C9;">
            <div class="container">
                <a class="navbar-brand" href="admin_login.php">
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
                <a class="navbar-brand fw-bolder" href="index.php">
                    <img src="photo/home.png" alt="" width="96" height="96" class="d-inline-block align-text-top">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp; Home</p>
                </a>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <img src="photo/unilogo1.png" alt="" srcset="" width=48% class="mx-auto d-block">
        </div>
        <h1 class="text-center text-white">Welcome to Oxford Student Management System <br><small>Plaese select your desired login mode.</small></h1>

    </main>

    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>