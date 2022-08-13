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
    <title>Admin Home</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS files -->
    <link rel="stylesheet" href="update.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="navfont.css">
    <title>Document</title>
</head>

<body>
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-light">
            <div class="container">
                <a class="navbar-brand fw-bolder" href="admin_profile.php">
                    <p>&nbsp; Profile</p>
                </a>
                <a class="navbar-brand" href="admin_profile_update.php">
                    <p>&nbsp; Profile Update</p>
                </a>
                <a class="navbar-brand" href="admin_student.php">
                    <p>&nbsp; Student Panel</p>
                </a>
                <a class="navbar-brand" href="admin_teacher.php">
                    <p>&nbsp; Faculty Panel</p>
                </a>
                <a class="navbar-brand" href="admin_adding_notice.php">
                    <p>&nbsp; Notice Board</p>
                </a>
                <a class="navbar-brand" href="admin_logout.php">
                    <p>&nbsp; Logout</p>
                </a>
            </div>
        </nav>
    </header>

    <main class="container mx-auto border border-0 rounded rounded-2 p-5" style="width: 80%;">
        <!-- PHP -->
        <?php
            // taking the username of the current logged in user 
            $user = $_SESSION['username'];
            //loading data from db table
            $select = mysqli_query($con, "SELECT * FROM admin_user WHERE adminuser = '$user';");
            $row = mysqli_fetch_array($select);
            echo "<strong>Welcome </strong><h1 class=\"fw-bold\" style=\"color: rgb(0, 255, 234);\">",ucwords($row['adminuser'])," ",ucwords($row['lname']),"</h1>";
       
            //formated text for the user
            if(is_array($row))
            {
                echo 
                "<strong>Phone Number .  . . . . : </strong><span>",$row['adminphone'],"</span><br>","<strong>Email . . . . . . . . . . . . . . . : </strong><span>",$row['adminemail'],"</span><br>";
            }
            $con->close();
            ?>
    </main>

    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>