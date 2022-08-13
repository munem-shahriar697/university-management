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
    <title>Add Faculty</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <!-- css files -->
    <link rel="stylesheet" href="update.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="navfont.css">
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
                <a class="navbar-brand  fw-bolder" href="admin_teacher.php">
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
                <a class="navbar-brand fw-bolder" href="admin_teacher_adding_steacher.php">
                    <p>&nbsp; Add Teacher</p>
                </a>
                <a class="navbar-brand" href="admin_teacher_showing_teacher.php">
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

    <main class="mx-auto border border-0 rounded rounded-2" style="width: 80%;">
        <!-- <h2 class="container align-content-center">Admin:
            <?php  echo $_SESSION['username']; ?>
        </h2><br> -->


        <div class="container" style="width: 1000px;">
        <!-- form to take faculty info -->
            <div class="add py-5 ps-5 mx-auto">
                <h3 class="text-white">Insert information of a Faculty to add</h3>
                <form action="admin_teacher_adding_teacher.php" method="post">
                    <input type="text" name="fname" id="fname"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="First Name"><br><br>
                    <input type="text" name="lname" id="lname"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="Last Name"><br><br>
                    <input type="text" name="phone" id="phone"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="Phone number"><br><br>
                    <input type="text" name="email" id="email"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="Email"><br><br>
                    <input type="text" name="dob" id="dob"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="Joining Date"
                        onfocus="(this.type='date')"><br><br>
                    <input list="departments" name="department" placeholder="Department"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;">
                    <datalist id="departments">
                        <option value="CSE">
                        <option value="EEE">
                        <option value="BBA">
                    </datalist>
                    <br><br>
                    <input type="submit" value="Add" name="add" class="fs-6 fw-bold border-1 rounded-2 px-1 button"
                        style="width: 60px;">
                </form>
            </div>
        </div>
    </main>

    <!-- PHP -->
    <?php
        // button click
        if(isset($_POST['add']))
        {
            $admin = $_SESSION['username'];
            $first = $_POST['fname'];
            $last = $_POST['lname'];
            $dept = $_POST['department'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $date = $_POST['dob'];

            //mysql query
            $select = mysqli_query($con, "SELECT * FROM teacher_user WHERE teacherphone = '$phone'");
            $row = mysqli_fetch_array($select);

            if(is_array($row))
            {
                $_SESSION['phone'] = $row['teacherphone'];
                echo '<script>alert("Do not add same faculty multiple times!!")</script>';
            }
            else if($_SESSION['username']=='')
            {
                header("Location:admin_login.php");
            }
            else if($first!='' || $last!='' || $email!='' || $phone!='' || $dept!='' || $date!='')
            {
                $sql = "INSERT INTO teacher_user(fname, lname, teacherphone, teacheremail, dept, joining_date, teacheruser, teacherpass, added_by) VALUES('$first', '$last', '$phone', '$email', '$dept', '$date', '$first', '$first','$admin');";
                if($con->query($sql)==true )
                {
                    echo '<script>alert("Successfully added Faculty")</script>';
                }
                else{
                    echo "ERROR: $con->error";
                }
            }
            else
            {
                echo '<script>alert("Please enter all the information correctly")</script>';
            }
        }
        $con->close();
    ?>

    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>