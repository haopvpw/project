<?php
//Start session
error_reporting(E_All ^ E_NOTICE);
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
    header("location:index.php");
 
}
else
{

include_once('../db.php');
?>
<?php include_once('include/header.php');?>
<body>
<div class="wrapper">
<div class="container">
<?php include_once('include/header1.php');?>
<div class="login">
<center><h1 style="color:brown;">Lecturer Panel</h1></center>
<a href="admin.php">back</a>
<form name="registrationform" method="post" action="show.php">
 <?php 
 $lecturer_number=$_SESSION['lecturer_number'];
 $query=mysql_query("select * from quizs q, subjects s, faculties f, courses c where q.subject_id=s.subject_id and q.faculty_id=f.faculty_id and q.course_id=c.course_id and s.lecturer_number=$lecturer_number")or die(mysql_error);
while ($rows=mysql_fetch_array($query))
{
 echo '<input type="radio" name="rad1" value="'.$rows['quiz_id'].'">'." ".$rows['quiz_name']." ".$rows['subject_name']."<br>";
}
?>
<div class="button" style="margin-left: 10px">
<input type="submit" name="add" value="See Scores"/>
</div>
</form>
</div>
<?php
}
?>
</div>
</div>
