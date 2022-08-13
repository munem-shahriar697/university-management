 <?php
    require_once('configure.php');

    //loading data from previous file
    $id = $_GET['id'];
    //mysql query
    $sql = "DELETE FROM teacher_user WHERE id='$id'";

    if(mysqli_query($con,$sql)==true)
    {
        echo "<script>location.href = \"admin_teacher_update_teacher.php\";</script>";
    }
    else
    {   
        echo "<script>location.href = \"admin_teacher_update_teacher.php\";</script>";
    }
    
    $con->close();
?>