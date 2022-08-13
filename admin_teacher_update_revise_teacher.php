<?php
    session_start();
    require_once('configure.php');
    $one = $_GET['iid'];
    $two = $_GET['fn'];
    $three = $_GET['ln'];
    $four = $_GET['date'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="photo/unilogo1.png">
    <title>Update Student Info</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
                <a class="navbar-brand" href="admin_teacher_adding_student.php">
                    <p>&nbsp; Add Teacher</p>
                </a>
                <a class="navbar-brand" href="admin_teacher_showing_student.php">
                    <p>&nbsp; All Teacher</p>
                </a>
                <a class="navbar-brand" href="admin_teacher_search_student.php">
                    <p>&nbsp; Find Teacher</p>
                </a>
                <a class="navbar-brand fw-bolder" href="admin_teacher_update_student.php">
                    <p>&nbsp; Update Teacher</p>
                </a>
            </div>
        </nav>
    </header>

    <main class="mx-auto border border-0 rounded rounded-2" style="width: 80%;">

        <!-- form to edit student information -->
        <div class="container" style="width: 1000px;">
            <div class="add py-5 ps-5 mx-auto">
                <h3 class="text-white">Update information of a Student</h3>
                <form action="admin_teacher_update_revise_teacher.php" method="post">

                    <input type="text" name="roll" id="roll" value="<?php echo "$one";?>"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;"><br><br>

                    <input type="text" name="fname" id="fname" value="<?php echo "$two";?>"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;"><br><br>

                    <input type="text" name="lname" id="lname" value="<?php echo "$three";?>"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;"><br><br>

                    <input type="text" name="dob" id="dob" value="<?php echo "$four";?>"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" onfocus="(this.type='date')"><br><br>

                    <input type="submit" value="Update" name="add" class="fs-6 fw-bold border-1 rounded-2 px-1 button"
                        style="width: 90px;">
                </form>
            </div>
        </div>
        <?php
        // button click
        if(isset($_POST['add']))
        {
            $admin = $_SESSION['username'];
            $id = $_POST['roll'];
            
            $first = $_POST['fname'];
            $last = $_POST['lname'];
            $date = $_POST['dob'];
            $address = $_POST['address'];
            
        // mysql query
        $sql = "UPDATE teacher_user SET fname = '$first',lname = '$last',joining_date = '$date' WHERE id = '$id';";
        
        if($con->query($sql)==TRUE)
        {
            
            echo "<script>location.href = \"admin_teacher_update_teacher.php\";</script>";
        }
            
            else if($_SESSION['username']=='')
            {
                header("Location:admin_login.php");
            }
            
            else
            {
                echo '<script>alert("Please enter all the information correctly")</script>';
                echo "<script>location.href = \"admin_teacher_update_teacher.php\";</script>";
            }
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
