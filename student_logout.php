<?php
    session_start();
    if(session_destroy()){
        header("location:student_login.php");
    }
?>