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
    <title>Update Student</title>
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
                <a class="navbar-brand" href="admin_student.php">
                    <p>&nbsp; Student Panel</p>
                </a>
                <a class="navbar-brand  fw-bolder" href="admin_teacher.php">
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
                <a class="navbar-brand fw-bolder" href="admin_teacher_update_teacher.php">
                    <p>&nbsp; Update Teacher</p>
                </a>
            </div>
        </nav>
    </header>

    <main class="mx-auto border border-0 rounded rounded-2 text-white px-5 pb-3 pt-3" style="width: 90%;">
        <!-- <h2 class="container bg-light">Admin: <?php  echo $_SESSION['username']; ?></h2><br> -->

        <div class="container" style="width: 1000px;">
            <div class="add py-5 ps-5 mx-auto">
                <h3 class="text-white">Search Student to Update or Delete</h3>
                <form action="admin_update_student.php" method="post">
                    <input type="text" name="name" id="name"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="Name or ID or Full Email"><br><br>


                    <input type="submit" value="Search" name="add" class="fs-6 fw-bold border-1 rounded-2 px-1 button"
                        style="width: 80px;">
                </form>
            </div>
        </div>
        <table class="table text-white table-bordered mt-3 p-2">
            <thead>
            <th>ID </th>
                <th>First name </th>
                <th>Last name </th>
                <th>Joining date </th>
                <th>Department </th>
                <th>Phone number </th>
                <th>Email </th>
                <th>Added by </th>
                <th colspan="2">Operations </th>
            </thead>
            <tbody>
                <?php
            if(isset($_POST['add'])==FALSE)
            {
                $user = $_SESSION['username'];
                $select = mysqli_query($con, "SELECT * FROM teacher_user");
            
                while($row = mysqli_fetch_array($select))
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
                    <td>" . "<a class=\"btn btn-info fw-bold\"href = 'admin_teacher_update_revise_teacher.php?iid=$row[id]&fn=$row[fname]&ln=$row[lname]&date=$row[joining_date]'>Update" . "</td>
                    <td>"."<a class=\"btn btn-danger fw-bold\"href = 'admin_teacher_update_delete_teacher.php?id=$row[id]'>Delete"."</td>
                    </tr>";
                } 
            } 
        ?>
        <?php
    //session_start();
        if(isset($_POST['add']))
        {
            $key = $_POST['name'];
            $rev = strrev($key);
            $select;
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
                        <td>" . "<a class=\"btn btn-info fw-bold\"href = '#'>Update" . "</td>
                        <td>"."<a class=\"btn btn-danger fw-bold\"href = 'admin_delete_student.php?id=$row[id]'>Delete"."</td>
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