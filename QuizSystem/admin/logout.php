<?php
unset($_SESSION['lecturer_number']);
session_start();
session_destroy();
header("location:../index.php");
?>
