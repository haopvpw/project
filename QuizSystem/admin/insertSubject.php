
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
$subject_name=$_POST['subject_name'];
$credit=$_POST['credit'];
$faculty_name=$_POST['faculty_name'];
$course_name=$_POST['course_name'];
$lecturer_number=$_POST['lecturer_number'];
$result1=mysql_query("select faculty_id from faculties where faculty_name='$faculty_name'");
$row1=mysql_fetch_array($result1);
$faculty_id=$row1['faculty_id'];
$result2=mysql_query("select course_id from courses where course_name='$course_name'");
$row2=mysql_fetch_array($result2);
$course_id=$row2['course_id'];
$add=mysql_query("insert into subjects (subject_name, credit, faculty_id, course_id, lecturer_number) values ('$subject_name',$credit, $faculty_id, $course_id, $lecturer_number)") or die(mysql_error);
}
?>


 <div class="registrationcomponent">
 <div class="innerform">
 <form name="registrationform" method="post">
 <div class="field">
 <label>Subject Name </label>
 <input type="text" name="subject_name">
 </div>
 <div class="field">
 <label>Credit </label>
 <input type="text" name="credit">
 </div>
 <div class="field">
 <label>Faculty Name </label>
 <input type="text" name="faculty_name">
 </div>
 <div class="field">
 <label>Course Name </label>
 <input type="text" name="course_name">
 </div>
 <div class="field">
 <label>Lecturer Number </label>
 <input type="text" name="lecturer_number">
 </div>
 <div class="button">
 <input type="submit" name="add" value="SUBMIT"/>
 <input type="reset" name="reset" value="RESET"/>
 </div>
 </form>
 </div>
 <a href="admin.php">Back</a>
 
 </div>
 <!-- footer -->
<?php include_once('include/footer.php');?>
</div>
</div>
<?php
}
?>
</body>
