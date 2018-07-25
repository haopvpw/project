 
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


<!-- component here -->
<div class="login">
<center><h1 style="color:brown;">Lecturer Panel</h1></center>
 <?php 
 $quiz_id=$_GET['quiz_id'];
 $query=mysql_query("select * from quizs q, subjects s, faculties f, courses c where q.subject_id=s.subject_id and q.faculty_id=f.faculty_id and q.course_id=c.course_id and quiz_id=$quiz_id")or die(mysql_error);
 while($rowfetch=mysql_fetch_array($query))
 {
 $quiz_name=$rowfetch['quiz_name'];
 $subject_name=$rowfetch['subject_name'];
 $faculty_name=$rowfetch['faculty_name'];
 $course_name=$rowfetch['course_name'];
 }
 
 if(isset($_POST['updatesubmit']))
 {
 $quiz_name=$_POST['quiz_name'];
 $subject_name=$_POST['subject_name'];
 $faculty_name=$_POST['faculty_name'];
 $course_name=$_POST['course_name'];
 
 $result1=mysql_query("UPDATE quizs SET quiz_name='$quiz_name' WHERE quiz_id=$quiz_id")or die(mysql_error);
 $result2=mysql_query("update quizs set faculty_id=(select f.faculty_id from faculties f where f.faculty_name='$faculty_name') where quiz_id=$quiz_id") or die('error in name of faculty');
 $result3=mysql_query("update quizs set course_id=(select c.course_id from courses c where c.course_name='$course_name') where quiz_id=$quiz_id") or die('error in course name');
?>
<script type="text/javascript">
window.location='update.php';
</script>
<?php
 }
 ?>
 
 <form name="udatesubmitform" method="post">
 <input type="hidden" name="quiz_id" value="<?php echo $quiz_id;?>"/>
 <div class="field">
 <label>Quiz Name</label>
 <input type="text" name="quiz_name" value="<?php echo $quiz_name;?>" required/>
 </div>
 <div class="field">
 <label>Subject</label>
 <input type="text" name="subject_name" value="<?php echo $subject_name;?>" required/>
 </div>
 <div class="field">
 <label>Faculty</label>
 <input type="text" name="faculty_name" value="<?php echo $faculty_name;?>" required/>
 </div>
 <div class="field">
 <label>Course</label>
 <input type="text" name="course_name" value="<?php echo $course_name;?>" required/>
 </div>
 <div class="button">
 <input type="submit" name="updatesubmit" value="UPDATE"/>
 <input type="reset" name="reset" value="RESET"/>
 
 </div>
 </form >
 </div>
 <a href="admin.php">Back</a>
<!-- ends here component-->

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