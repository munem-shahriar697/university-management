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
    <title>Add Student</title>
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
                <a class="navbar-brand" href="admin_teacher.php">
                    <p>&nbsp; Faculty Panel</p>
                </a>
                <a class="navbar-brand fw-bolder" href="admin_adding_notice.php">
                    <p>&nbsp; Notice Board</p>
                </a>
                
                <a class="navbar-brand" href="admin_logout.php">
                    <p>&nbsp; Logout</p>
                </a>
            </div>
        </nav>
    </header>

    <main class="mx-auto border border-0 rounded rounded-2 px-4 pb-4" style="width: 90%;">
        <!-- <h2 class="container bg-light">Admin: <?php  echo $_SESSION['username']; ?></h2><br> -->

        <div class="container" style="width: 1000px;">
            <div class="add py-3 ps-5 mx-auto">
                <h3 class="text-white">Add new notice</h3>

                <!-- input for notice with form -->
                <form action="admin_adding_notice.php" method="post">

                    <textarea name="notice" id="notice" placeholder="Notice" cols="30" rows="10"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 60px; width:90%;"></textarea><br><br>

                    <input type="submit" value="Add" name="add" class="fs-6 fw-bold border-1 rounded-2 px-1 button"
                        style="width: 60px;">
                </form>
            </div>
        </div>
        <?php

        //checking for button click
        if(isset($_POST['add']))
        {
            //taking current user and notice input
            $admin = $_SESSION['username'];
            $notice = $_POST['notice'];

            if($_SESSION['username']=='')
            {
                header("Location:admin_login.php");
            }
            else if($notice!='')
            {
                //mysql query
                $sql = "INSERT INTO notice (notice, added_by) VALUES ('$notice', '$admin');";
                if($con->query($sql)==true )
                {
                    echo '<script>alert("Successfully added Notice !")</script>';
                }
                else{
                    echo "ERROR: $con->error";
                }
            }
            else
            {
                echo '<script>alert("Please enter all the information correctly !")</script>';
            }
        }
    ?>

        <!-- table to show notice and it's other information -->
        <table class="table text-white table-bordered mt-3 customtable">
            <thead>
                <th>ID </th>
                <th>Date </th>
                <th>Notice</th>
                <th>Added by</th>
                <th sytle="width:70px;">Operations </th>
            </thead>
            <tbody>
            <?php
            //loading from the notice db table and showing inside the html table
            //the notices are sorted by descending order by the number
            //it can be implemented by two ways sorting with the publishing date or it's serial number
            //sorting it by date causes one problem the newest notice doesn't come up on top
                $user = $_SESSION['username'];
                $select = mysqli_query($con, "SELECT * FROM notice ORDER BY id DESC;");
            
                //printing every available notices loaded from notice db table
                while($row = mysqli_fetch_array($select))
                {
                    echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['pub_date'] . "</td>
                        <td>" . $row['notice'] . "</td>
                        <td>" . $row['added_by'] . "</td>
                        <td sytle=\"width:70px;\">"."<a class=\"btn btn-danger fw-bold\"href = 'admin_delete_notice.php?id=$row[id]'>Delete"."</td>
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