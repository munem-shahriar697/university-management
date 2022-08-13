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
    <title>Find Teacher</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <!-- css files -->
    <link rel="stylesheet" href="update.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="navfont.css">
    <!-- custom css -->
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
        <!-- navbar -->
    <nav class="navbar navbar-light">
            <div class="container">
                <a class="navbar-brand" href="admin_profile.php">
                    <p>&nbsp; Profile</p>
                </a>
                <a class="navbar-brand" href="admin_profile_update.php">
                    <p>&nbsp; Profile Update</p>
                </a>
                <a class="navbar-brand" href="admin_student.php">
                    <p>&nbsp; Student Panel</p>
                </a>
                <a class="navbar-brand fw-bolder" href="admin_teacher.php">
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
        <!-- sub navbar -->
        <nav class="navbar navbar-light">
            <div class="container justify-content-around">
                <a class="navbar-brand" href="admin_teacher_adding_teacher.php">
                    <p>&nbsp; Add Teacher</p>
                </a>
                <a class="navbar-brand" href="admin_teacher_showing_teacher.php">
                    <p>&nbsp; All Teacher</p>
                </a>
                <a class="navbar-brand fw-bolder" href="admin_teacher_search_teacher.php">
                    <p>&nbsp; Find Teacher</p>
                </a>
                <a class="navbar-brand" href="admin_teacher_update_teacher.php">
                    <p>&nbsp; Update Teacher</p>
                </a>
            </div>
        </nav>
    </header>

    <main class="mx-auto border border-0 rounded rounded-2 text-white px-5 pb-3 pt-3" style="width: 80%;">
    <!-- <h2 class="container bg-light">Admin: <?php  echo $_SESSION['username']; ?></h2><br> -->

    <div class="container" style="width: 1000px;">
    <!-- form to search faculty -->
            <div class="add py-5 ps-5 mx-auto">
                    <form action="admin_teacher_search_teacher.php" method="post">
                    <input type="text" name="name" id="name"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="Search Name or ID"><br><br>
                    
                    
                    <input type="submit" value="Search" name="add" class="fs-6 fw-bold border-1 rounded-2 px-1 button" style="width: 80px;">
            </form>
            </div>
        </div>
        <!-- table for faculty info -->
        <table class="table text-white table-bordered mt-3 p-2 customtable">
        <thead>
                <th style="width: 91px;">ID </th>
                <th style="width: 110px;">First name </th>
                <th style="width: 110px;">Last name </th>
                <th style="width: 135px;">Joining date </th>
                <th style="width: 110px;">Department </th>
                <th style="width: 150px;">Phone number </th>
                <th >Email </th>
                <th style="width: 99px;">Added by </th>
            </thead>
            <tbody>
    <?php
        //button click
        if(isset($_POST['add']))
        {
            $key = $_POST['name'];
            $rev = strrev($key);
            $select;

            // mysql query
            if(substr($key,0,3)=="201")
            {
                $select = mysqli_query($con, "SELECT * FROM teacher_user WHERE id LIKE '%$key%'");
            }
            else if(substr($rev,0,3)=="ude")
            {
                $select = mysqli_query($con, "SELECT * FROM teacher_user WHERE teacheremail LIKE '%$key%'");
            }
            else
            {
                $select = mysqli_query($con, "SELECT * FROM teacher_user WHERE CONCAT(fname,\" \",lname) LIKE '%$key%'");
            }
            
            if($key!='')
            {    while($row = mysqli_fetch_array($select))
                {
                    echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . ucwords($row['fname']) . "</td>
                    <td>" . ucwords($row['lname']) . "</td>
                    <td>" . $row['joining_date'] . "</td>
                    <td>" . $row['dept'] . "</td>
                    <td>" . $row['teacherphone'] . "</td>
                    <td>" . $row['teacheremail'] . "</td>
                    <td>" . $row['added_by'] . "</td>
                </tr>";
                } 
            }
            else
            {
                echo '<script>alert("Search box is blank!!")</script>';
            }
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