 <?php
    require_once('configure.php');

    //loading data from previous flie
    $id = $_GET['id'];

    //mysql query
    $sql = "DELETE FROM student_user WHERE id='$id'";

    if(mysqli_query($con,$sql)==true)
    {
        //echo '<script>alert("Successfully removed Student from Database!!")</script>';
        echo "<script>location.href = \"admin_update_student.php\";</script>";
    }
    else
    {
        //echo '<script>alert("Could not remove Student from Database!!")</script>';
        echo "<script>location.href = \"admin_update_student.php\";</script>";
    }
    
    $con->close();
?>