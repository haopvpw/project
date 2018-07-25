<?php
 
//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
    header("location:index.php");
    exit();	
}
else
{
 error_reporting("E_All");
include_once('../db.php');
$student_number=$_GET['student_number'];
$query=mysql_query("delete from students where student_number='$student_number'");
header('LOCATION:Update.php');
}
?>