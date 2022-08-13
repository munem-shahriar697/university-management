 <?php
    require_once('configure.php');

    $id = $_GET['id'];
    $grade = $_GET['grade'];
    $select = mysqli_query($con, "SELECT * FROM student_user WHERE id = $id");
    $row = mysqli_fetch_array($select);

    $cgpa = $row['cgpa'];

    $final = (($grade*3)+($cgpa*3))/6;
     
    $sql = "UPDATE student_user SET cgpa = '$final' WHERE id='$id'";

    if(mysqli_query($con,$sql)==true)
    {
        echo '<script>alert("Successfully updated grade!!")</script>';
        echo "<script>location.href = \"teacher_grading.php\";</script>";
    }
    else
    {
        //echo '<script>alert("Could not remove Student from Database!!")</script>';
        echo "<script>location.href = \"teacher_grading.php\";</script>";
    }
    
    $con->close();
?>