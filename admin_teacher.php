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
    <link rel="icon" type="image/x-icon" href="photo/unilogo1.png">
    <title>Student Panel</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="update.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="navfont.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-light">
            <div class="container">
                <a class="navbar-brand" href="admin_profile.php">
                    <p>&nbsp; Profile</p>
                </a>
                <a class="navbar-brand " href="admin_student.php">
                    <p>&nbsp; Student Panel</p>
                </a>
                <a class="navbar-brand fw-bolder" href="admin_teacher.php">
                    <p>&nbsp; Faculty Panel</p>
                </a>
                <a class="navbar-brand" href="admin_adding_section.php">
                    <p>&nbsp; Assigning section</p>
                </a>
                <a class="navbar-brand" href="admin_adding_course.php">
                    <p>&nbsp; Adding Course</p>
                </a>
                <a class="navbar-brand" href="admin_logout.php">
                    <p>&nbsp; Logout</p>
                </a>
            </div>
        </nav>
        <nav class="navbar navbar-light">
            <div class="container justify-content-around">
                <a class="navbar-brand" href="admin_teacher_adding_teacher.php">
                    <p>&nbsp; Add Teacher</p>
                </a>
                <a class="navbar-brand" href="admin_teacher_showing_teacher.php">
                    <p>&nbsp; All Teacher</p>
                </a>
                <a class="navbar-brand" href="admin_teacher_search_teacher.php">
                    <p>&nbsp; Find Teacher</p>
                </a>
                <a class="navbar-brand" href="admin_teacher_update_teacher.php">
                    <p>&nbsp; Update Teacher</p>
                </a>
            </div>
        </nav>
    </header>

    <main class="mx-auto border border-0 rounded rounded-2" style="width: 80%;">
    

    <div class="container" style="width: 1000px;">
            <div class="add py-5 mx-auto">
                <strong class="text-white">Welcome</strong>
                <h2 class="text-info"><?php  echo ucwords($_SESSION['username']); ?></h2>
                <h3 class="text-white">Please select your desired mode</h3>
                    
            </div>
        </div>
    </main>

    <?php
        $con->close();
    ?>

    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>