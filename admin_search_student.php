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
    <title>Find Student</title>
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
                <a class="navbar-brand fw-bolder" href="admin_student.php">
                    <p>&nbsp; Student Panel</p>
                </a>
                <a class="navbar-brand" href="admin_adding_teacher.php">
                    <p>&nbsp; Adding faculty</p>
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
                <a class="navbar-brand" href="admin_adding_student.php">
                    <p>&nbsp; Add Student</p>
                </a>
                <a class="navbar-brand" href="admin_showing_student.php">
                    <p>&nbsp; All Students</p>
                </a>
                <a class="navbar-brand fw-bolder" href="admin_search_student.php">
                    <p>&nbsp; Find Student</p>
                </a>
                <a class="navbar-brand" href="admin_update_student.php">
                    <p>&nbsp; Update Student</p>
                </a>
            </div>
        </nav>
    </header>

    <main class="mx-auto border border-0 rounded rounded-2 text-white px-5 pb-3 pt-3" style="width: 80%;">
    <!-- <h2 class="container bg-light">Admin: <?php  echo $_SESSION['username']; ?></h2><br> -->

    <div class="container" style="width: 1000px;">
            <div class="add py-5 ps-5 mx-auto">
                    <form action="admin_search_student.php" method="post">
                    <input type="text" name="name" id="name"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="Search Name or ID"><br><br>
                    
                    
                    <input type="submit" value="Search" name="add" class="fs-6 fw-bold border-1 rounded-2 px-1 button" style="width: 80px;">
            </form>
            </div>
        </div>
        <table class="table text-white table-bordered mt-3 p-2">
            <thead>
                <th>ID </th>
                <th>First name </th>
                <th>Last name </th>
                <th>Birth date </th>
                <th>Blood group </th>
                <th>Department </th>
                <th>Semester </th>
                <th>CGPA </th>
                <th>Phone number </th>
                <th>Email </th>
                <th>Address </th>
                <th>Added by </th>
            </thead>
            <tbody>
    <?php
    //session_start();
        if(isset($_POST['add']))
        {
            //nowrin.islam@northsouth.edu
            $key = $_POST['name'];
            $rev = strrev($key);
            $select;
            if(substr($key,0,3)=="301")
            {
                $select = mysqli_query($con, "SELECT * FROM student_user WHERE id LIKE '%$key%'");
            }
            else if(substr($rev,0,4)=="ude.htuoshtron@")
            {
                $select = mysqli_query($con, "SELECT * FROM student_user WHERE studentemail LIKE '%$key%'");
            }
            else
            {
                $select = mysqli_query($con, "SELECT * FROM student_user WHERE CONCAT(fname,\" \",lname) LIKE '%$key%'");
            }
            
            if($key!='')
            {    while($row = mysqli_fetch_array($select))
                {
                    echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . ucwords($row['fname']) . "</td>
                        <td>" . ucwords($row['lname']) . "</td>
                        <td>" . $row['birth_date'] . "</td>
                        <td>" . $row['blood_group'] . "</td>
                        <td>" . $row['dept'] . "</td>
                        <td>" . $row['semester'] . "</td>
                        <td>" . $row['cgpa'] . "</td>
                        <td>" . $row['studentphone'] . "</td>
                        <td>" . $row['studentemail'] . "</td>
                        <td>" . $row['addr'] . "</td>
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