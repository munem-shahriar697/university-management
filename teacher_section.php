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
    <title>Admin Interface</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="photo/unilogo1.png">
    <title>Section</title>
    <link rel="stylesheet" href="navfont.css">
    <link rel="stylesheet" href="teacher.css">
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
                <a class="navbar-brand" href="teacher_profile.php">
                    <p>&nbsp; Profile</p>
                </a>
                <a class="navbar-brand" href="teacher_profile_update.php">
                    <p>&nbsp; Profile Update</p>
                </a>
                <a class="navbar-brand fw-bolder" href="teacher_section.php">
                    <p>&nbsp; Students</p>
                </a>
                <a class="navbar-brand" href="teacher_grading.php">
                    <p>&nbsp; Grading</p>
                </a>
                <a class="navbar-brand" href="teacher_notice.php">
                    <p>&nbsp; Notice Board</p>
                </a>
                <a class="navbar-brand" href="teacher_logout.php">
                    <p>&nbsp; Logout</p>
                </a>
            </div>
        </nav>
    </header>

    <main class="mx-auto border border-0 rounded rounded-2 text-white px-5 pb-3 pt-3" style="width: 90%;">
        <table class="table text-white table-bordered mt-3 customtable">
            <thead>
                <th>ID </th>
                <th>First name </th>
                <th>Last name </th>
                <th>Birth date </th>
                <th>Blood group </th>
                <th>Gender </th>
                <th>Department </th>
                <th>Semester </th>
                <th>CGPA </th>
                <th>Phone number </th>
                <th>Email </th>
            </thead>
            <tbody>
                <?php
                $user = $_SESSION['username'];
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
                    <td>" . $row['dept'] . "</td>
                    <td>" . $row['semester'] . "</td>
                    <td>" . $row['cgpa'] . "</td>
                    <td>" . $row['studentphone'] . "</td>
                    <td>" . $row['studentemail'] . "</td>
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