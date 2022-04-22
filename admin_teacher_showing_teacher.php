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
    <title>All Students</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="update.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="navfont.css">
    <style>
        tbody {
            font-weight: 400;
        }
    </style>
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
                <a class="navbar-brand fw-bolder href="admin_teacher.php">
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
                <a class="navbar-brand fw-bolder" href="admin_teacher_showing_teacher.php">
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

    <main class="mx-auto border border-0 rounded rounded-2 text-white px-5 pb-3 pt-3" style="width: 80%;">
        <h2 class="container">Welcome
            <?php  echo ucwords($_SESSION['username']); ?> to adding section
        </h2>

        <table class="table text-white table-bordered mt-3">
            <thead>
                <th>ID </th>
                <th>First name </th>
                <th>Last name </th>
                <th>Joining date </th>
                <th>Department </th>
                <th>Phone number </th>
                <th>Email </th>
                <th>Added by </th>
            </thead>
            <tbody>
                <?php
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
    </table>
</body>

</html>