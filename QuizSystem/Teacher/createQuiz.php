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
<?php
if(isset($_POST['add']))
{
include ('../db.php');
$quiz_name=$_POST['quiz_name'];
$subject=$_POST['subject_name'];
$faculty_name=$_POST['faculty_name'];
$course_name=$_POST['course_name'];


$result3=mysql_query("select * from subjects s, faculties f, courses c where s.faculty_id=f.faculty_id and s.course_id=c.course_id and 
f.faculty_name='$faculty_name' and c.course_name='$course_name' and s.subject_name='$subject'");
$row3=mysql_fetch_array($result3);
$faculty_id=$row3['faculty_id'];
$course_id=$row3['course_id'];
$subject_id=$row3['subject_id'];

$add=mysql_query("insert into quizs (quiz_name, faculty_id, subject_id, course_id) values ('$quiz_name',$faculty_id, $subject_id, $course_id)") or die(mysql_error);
}
?>
<div class="registrationcomponent">
 <div class="innerform">
 <form name="registrationform" method="post">
 <div class="field">
 <label>Quiz Name </label>
 <input type="text" name="quiz_name">
 </div>
 <div class="field">
 <label>Subject </label>
 <input type="text" name="subject_name">
 </div>
 <div class="field">
 <label>Faculty </label>
 <input type="text" name="faculty_name">
 </div>
 <div class="field">
 <label>Course Name </label>
 <input type="text" name="course_name">
 </div>
 
 <div class="button">
 <input type="submit" name="add" value="SUBMIT"/>
 <input type="reset" name="reset" value="RESET"/>
 </div>
 </form>
 </div>
 <a href="admin.php">Back</a>
 
 </div>

<!-- footer here -->
<?php include_once('include/footer.php');?>
<!-- ends here footer -->
</div>
</div>
<?php
}
?>
</body>
</html>