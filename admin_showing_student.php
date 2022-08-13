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
    <!-- css files -->
    <link rel="stylesheet" href="update.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="navfont.css">
    <!-- custom css -->
    <style>
        tbody {
            font-weight: 400;
        }

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
                <a class="navbar-brand fw-bolder" href="admin_student.php">
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
        <!-- sub navbar -->
        <nav class="navbar navbar-light">
            <div class="container justify-content-around">
                <a class="navbar-brand" href="admin_adding_student.php">
                    <p>&nbsp; Add Student</p>
                </a>
                <a class="navbar-brand fw-bolder" href="admin_showing_student.php">
                    <p>&nbsp; All Students</p>
                </a>
                <a class="navbar-brand" href="admin_search_student.php">
                    <p>&nbsp; Find Student</p>
                </a>
                <a class="navbar-brand" href="admin_update_student.php">
                    <p>&nbsp; Update Student</p>
                </a>
            </div>
        </nav>
    </header>

    <main class="mx-auto border border-0 rounded rounded-2 text-white px-5 pb-3 pt-3" style="width: 90%;">
        <!--table to show data in order  -->
    <table class="table text-white table-bordered mt-3 customtable">
            <thead>
                <th style="width: 91px;">ID </th>
                <th style="width: 91px;">First name </th>
                <th style="width: 91px;">Last name </th>
                <th style="width: 71px;">Birth date </th>
                <th style="width: 61px;">Blood group </th>
                <th style="width: 71px;">Gender </th>
                <th style="width: 109px;">National ID </th>
                <th style="width: 109px;">Birth Certificate </th>
                <th style="width: 107px;">Department </th>
                <th style="width: 89px;">Semester </th>
                <th style="width: 61px;">CGPA </th>
                <th style="width: 115px;">Phone number </th>
                <th>Email </th>
                <th>Address </th>
                <th style="width: 81px;">Added by </th>
            </thead>
            <tbody>
                <?php
                $user = $_SESSION['username'];
                //mysql query
                $select = mysqli_query($con, "SELECT * FROM student_user");
        
            while($row = mysqli_fetch_array($select))
            {
                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . ucwords($row['fname']) . "</td>
                    <td>" . ucwords($row['lname']) . "</td>
                    <td>" . $row['birth_date'] . "</td>
                    <td>" . $row['blood_group'] . "</td>
                    <td>" . $row['studentgender'] . "</td>
                    <td>" . $row['studentnid'] . "</td>
                    <td>" . $row['studentbirth_cert'] . "</td>
                    <td>" . $row['dept'] . "</td>
                    <td>" . $row['semester'] . "</td>
                    <td>" . $row['cgpa'] . "</td>
                    <td>" . $row['studentphone'] . "</td>
                    <td>" . $row['studentemail'] . "</td>
                    <td>" . $row['addr'] . "</td>
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