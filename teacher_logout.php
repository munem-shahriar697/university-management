<?php
    session_start();
    if(session_destroy()){
        header("location:teacher_login.php");
    }
?>