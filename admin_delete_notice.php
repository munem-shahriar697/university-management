 <?php
    //connection
    require_once('configure.php');

    //parsing information from button click
    $id = $_GET['id'];

    //sql query
    $sql = "DELETE FROM notice WHERE id='$id'";

    if(mysqli_query($con,$sql)==true)
    {
        //echo '<script>alert("Successfully removed Student from Database!!")</script>';
        echo "<script>location.href = \"admin_adding_notice.php\";</script>";
    }
    else
    {
        //echo '<script>alert("Could not remove Student from Database!!")</script>';
        echo "<script>location.href = \"admin_adding_notice.php\";</script>";
    }
    
    $con->close();
?>