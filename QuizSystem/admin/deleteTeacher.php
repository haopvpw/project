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
$lecturer_number=$_GET['lecturer_number'];
$query=mysql_query("delete from lecturers where lecturer_number='$lecturer_number'");
header('LOCATION:updateTeacher.php');
}
?>