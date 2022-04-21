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
    <title>CGPA</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="update.css">
    <link rel="stylesheet" href="navfont.css">
    <link rel="stylesheet" href="student.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-light">
            <div class="container">
                <a class="navbar-brand" href="student_profile.php">
                    <p>&nbsp; Profile</p>
                </a>
                <a class="navbar-brand" href="student_profile_update.php">
                    <p>&nbsp; Profile Update</p>
                </a>
                <a class="navbar-brand fw-bolder" href="student_cgpa.php">
                    <p>&nbsp; CGPA</p>
                </a>
                <a class="navbar-brand" href="student_logout.php">
                    <p>&nbsp; Logout</p>
                </a>
            </div>
        </nav>
    </header>

    <main class="container mx-auto border border-0 rounded rounded-2 p-5" style="width: 80%;">

        <!-- PHP -->
        <?php
        $user = $_SESSION['username'];
        $select = mysqli_query($con, "SELECT * FROM student_user WHERE id = $user");
        $row = mysqli_fetch_array($select);
        if(is_array($row))
        {
            echo "<strong>Id.. . . . . . . . . . : </strong><span>", $row['id'],"</span><br>", "<strong>Name. . .  . . . : </strong><span>",ucwords($row['fname'])," ",ucwords($row['lname']),"</span><br>","<strong>CGPA . . . . . . : </strong><span>",$row['cgpa'],"</span><br>";
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