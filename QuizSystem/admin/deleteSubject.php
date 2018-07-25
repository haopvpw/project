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
$subject_id=$_GET['subject_id'];
$query=mysql_query("delete from subjects where subject_id='$subject_id'");
header('LOCATION:updateSubject.php');
}
?>