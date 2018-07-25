<?php
unset($_SESSION['student_number']);
session_start();
session_destroy();
header("location:../index.php");
?>
