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
    <!-- CSS -->
    <link rel="stylesheet" href="update.css">
    <link rel="stylesheet" href="navfont.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="image/x-icon" href="photo/unilogo1.png">
    <title>Update Phone</title>
</head>

<body>
    <header>
        <!-- navbar -->
    <nav class="navbar navbar-light">
            <div class="container">
                <a class="navbar-brand" href="admin_profile.php">
                    <p>&nbsp; Profile</p>
                </a>
                <a class="navbar-brand fw-bolder" href="admin_profile_update.php">
                    <p>&nbsp; Profile Update</p>
                </a>
                <a class="navbar-brand" href="admin_student.php">
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
                <a class="navbar-brand fw-bolder" href="admin_profile_update_phone.php">
                    <p>&nbsp; Phone Number Update</p>
                </a>
                <a class="navbar-brand" href="admin_profile_update_email.php">
                    <p>&nbsp; Email Update</p>
                </a>
                <a class="navbar-brand" href="admin_profile_update_password.php">
                    <p>&nbsp; Password Update</p>
                </a>
            </div>
        </nav>
    </header>

    <main class="container mx-auto border border-0 rounded rounded-2 p-5" style="width: 80%;">
        <br><br>
        <!-- PHP -->
        <?php
            $user = $_SESSION['username'];
            //mysql query
            $select = mysqli_query($con, "SELECT * FROM admin_user WHERE adminuser = '$user'");
            $row = mysqli_fetch_array($select);
            if(is_array($row))
            {
                echo "&nbsp; <strong>Current Phone number: </strong><span>",$row['adminphone'],"</span><br>";
            }
        ?>
        <br><br>
        <div class="container">
            <div class="add">
                <!-- form to take new phone number -->
                <h3>Enter new phone number to update</h3>
                <form action="admin_profile_update_phone.php" method="post">
                    <input type="text" name="phone" id="phone"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light"
                        style="height: 38px; width:48%;" placeholder="New Phone number"><br><br>
                    <input type="password" name="password" id="password"
                        class="border border-2 border-dark rounded rounded-2 fs-5 fw-light bg-light "
                        style="height: 38px; width:48%;" placeholder="Insert password to confirm"><br><br>
                    <input type="submit" value="Update" name="add" class="fs-6 fw-bold border-1 rounded-2 px-1 button">
                </form>
            </div>
        </div>
        <!-- updating email php code -->
        <?php
            if(isset($_POST['add']))
            {
            //taking info from form
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            
            if($phone!='' && $password!='' && $password==$row['adminpass'])
            {
                //mysql query
                $sql = "UPDATE admin_user SET adminphone = '$phone' WHERE adminuser = '$user';";
                if($con->query($sql)==true)
                {
                    echo '<script>alert("Successfully updated Phone number!!")</script>';
                    header("Refresh:0");
                }
            }
            else if($password!=$row['adminpass'])
            {
                echo '<script>alert("Please insert correct password!!")</script>';
                header("Refresh:0");
            }
            else
            {
                echo '<script>alert("Please insert new phone number & password!!")</script>';
                header("Refresh:0");
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