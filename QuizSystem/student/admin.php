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
?>
<?php include_once('include/header.php');?>
<body>
<div class="wrapper">
<div class="container">
<?php include_once('include/header1.php');?>
<!-- component here -->
<div class="login">
<a href="logout.php">Logout</a>
<h1 style="color:brown;">Student Panel</h1>
<ul>
<li><a href="update.php" >Update Your Personal Information</a></li>
</ul>
<h1 style="color:brown; text-align: center">Available Subjects and Quiz</h1>
<form name="registrationform" method="post" action="quizs.php">
<?php

$student_number=$_SESSION['student_number'];
$subjects=mysql_query("select * from students s, courses c, faculties f, subjects s1, quizs q 
where s.course_id=s1.course_id and s.faculty_id=s1.faculty_id and s.course_id=c.course_id and s.faculty_id=f.faculty_id 
and s.student_number=$student_number and q.course_id=s.course_id and q.faculty_id=s.faculty_id and q.subject_id=s1.subject_id");
echo "<br>";
while ($rows=mysql_fetch_array($subjects))
{
   echo '<input type="radio" name="rad1" value="'.$rows['quiz_id'].'">'." ".$rows['quiz_name']." ".$rows['subject_name']."<br>";
}
?>
<div class="button" style="margin-left: 10px">
<input type="submit" name="add" value="Take Quiz"/>
</div>
</form>


</div>


<!-- footer here -->
<?php include_once('include/footer.php');?>

</div>
</div>
<?php
}
?>
</body>
</html>