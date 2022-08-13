<?php
    session_start();
    //$con = mysqli_connect('localhost','root','','cse311_db') or die ('Unable to connect');
    require_once('configure.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="photo/unilogo1.png">
    <title>Add Student</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="update.css">
    <link rel="stylesheet" href="student.css">
    <link rel="stylesheet" href="navfont.css">
    <style>
        .customtable {
            table-layout: fixed;
        }

        td {
            word-wrap: break-word;
        }
    </style>
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
                <a class="navbar-brand" href="student_cgpa.php">
                    <p>&nbsp; CGPA</p>
                </a>
                <a class="navbar-brand fw-bolder" href="student_notice.php">
                    <p>&nbsp; Notice Board</p>
                </a>
                <a class="navbar-brand" href="student_logout.php">
                    <p>&nbsp; Logout</p>
                </a>
            </div>
        </nav>

    <main class="mx-auto border border-0 rounded rounded-2 px-4 pb-4 py-3" style="width: 90%;">
        <!-- <h2 class="container bg-light">Admin: <?php  echo $_SESSION['username']; ?></h2><br> -->

        <table class="table text-white table-bordered pt-3 customtable">
            <thead>
                <th style="width: 120px;">Publication date </th>
                <th>Notice</th>
            </thead>
            <tbody>
                <?php
                $user = $_SESSION['username'];
                $select = mysqli_query($con, "SELECT * FROM notice ORDER BY id DESC;");
        
            while($row = mysqli_fetch_array($select))
            {
                echo "<tr>
                    <td>" . $row['pub_date'] . "</td>
                    <td>" . $row['notice'] . "</td>
                </tr>";
            } 
            $con->close();
        ?>
            </tbody>
        </table>

    </main>



    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>