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
                <a class="navbar-brand fw-bolder" href="admin_adding_student.php">
                    <p>&nbsp; Add Student</p>
                </a>
                <a class="navbar-brand" href="admin_showing_student.php">
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

    <main class="mx-auto border border-0 rounded rounded-2" style="width: 80%;">
    <!-- <h2 class="container bg-light">Admin: <?php  echo $_SESSION['username']; ?></h2><br> -->

    <div class="container" style="width: 1000px;">
            <div class="add py-5 ps-5 mx-auto">
                <h3 class="text-white">Insert information of a Student to add</h3>
                    <form action="admin_adding_student.php" method="post">
                    <input type="text" name="fname" id="fname"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="First Name"><br><br>
                    <input type="text" name="lname" id="lname"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="Last Name"><br><br>
                    <input type="text" name="dob" id="dob"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="Date of Birth" onfocus="(this.type='date')"><br><br>
                    <input type="text" name="phone" id="phone"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="Phone number"><br><br>
                    <input type="text" name="email" id="email"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="Email"><br><br>
                    <input list="departments" name="department" placeholder="Department" class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light" style="height: 38px; width:90%;">
                        <datalist id="departments">
                            <option value="CSE">
                            <option value="EEE">
                            <option value="BBA">
                        </datalist>
                    <br><br>
                    <input list="semesters" name="semester" placeholder="Semester" class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light" style="height: 38px; width:90%;">
                        <datalist id="semesters">
                            <option value="1">
                            <option value="2">
                            <option value="3">
                            <option value="4">
                            <option value="5">
                            <option value="6">
                            <option value="7">
                            <option value="8">
                            <option value="9">
                            <option value="10">
                            <option value="11">
                            <option value="12">
                        </datalist>
                    <br><br>
                    <input type="text" name="cgpa" id="cgpa"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:90%;" placeholder="CGPA"><br><br>
                    <input list="bgs" name="bg" placeholder="Blood Group" class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light" style="height: 38px; width:90%;">
                        <datalist id="bgs">
                            <option value="A+">
                            <option value="B+">
                            <option value="AB+">
                            <option value="O+">
                            <option value="A-">
                            <option value="B-">
                            <option value="AB-">
                            <option value="O-">
                        </datalist>
                    <br><br>
                    <textarea name="address" id="address" placeholder="Address" cols="30" rows="10"class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light" style="height: 60px; width:90%;"></textarea><br><br>
                    
                    <input type="submit" value="Add" name="add" class="fs-6 fw-bold border-1 rounded-2 px-1 button" style="width: 60px;">
            </form>
            </div>
        </div>
    </main>

    <?php
    //session_start();
        if(isset($_POST['add']))
        {
            $admin = $_SESSION['username'];
            $first = $_POST['fname'];
            $last = $_POST['lname'];
            $dept = $_POST['department'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $date = $_POST['dob'];
            $semester = $_POST['semester'];
            $bg = $_POST['bg'];
            $cgpa = $_POST['cgpa'];
            $address = $_POST['address'];

            $select = mysqli_query($con, "SELECT * FROM student_user WHERE studentphone = '$phone'");
            $row = mysqli_fetch_array($select);

            if(is_array($row))
            {
                $_SESSION['phone'] = $row['studentphone'];
                echo '<script>alert("Do not add same student multiple times!!")</script>';
            }
            else if($_SESSION['username']=='')
            {
                header("Location:admin_login.php");
            }
            else if($first!='' || $last!='' || $email!='' || $phone!='' || $dept!='' || $date!='')
            {
                $sql = "INSERT INTO student_user (fname, lname, birth_date, studentphone, studentemail, dept, semester, cgpa, blood_group, addr, studentuser, studentpass, added_by) VALUES ('$first', '$last', '$date', '$phone', '$email', '$dept', '$semester', '$cgpa', '$bg', '$address','$first', '$phone','$admin');";
                if($con->query($sql)==true )
                {
                    echo '<script>alert("Successfully added Student")</script>';
                }
                else{
                    echo "ERROR: $con->error";
                }
            }
            else
            {
                echo '<script>alert("Please enter all the information correctly")</script>';
            }
            $con->close();
        }
    ?>

    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>