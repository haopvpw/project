 
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
<center><h1 style="color:brown;">Admin Panel</h1></center>
 <?php 
 $subject_id=$_GET['subject_id'];
 $query=mysql_query("select *  from subjects s, faculties f, courses c where c.course_id=s.course_id and f.faculty_id=s.faculty_id and s.subject_id=$subject_id")or die(mysql_error);
 while($rowfetch=mysql_fetch_array($query))
 {
 $subject_id=$rowfetch['subject_id'];
 $subjectName=$rowfetch['subject_name'];
 $credit=$rowfetch['credit'];
 $faculty_name=$rowfetch['faculty_name'];
 $course_name=$rowfetch['course_name'];
 $lecturer_number=$rowfetch['lecturer_number'];
 }
 
 if(isset($_POST['updatesubmit']))
 {
 $subject_id=$_POST['subject_id'];
 $subjectName=$_POST['subject_name'];
 $credit=$_POST['credit'];
 $faculty_name=$_POST['faculty_name'];
 $course_name=$_POST['course_name'];
 $lecturer_number=$_POST['lecturer_number'];
 $updataquery=mysql_query("SELECT * FROM subjects");
 $result1=mysql_query("UPDATE subjects SET subject_name='$subjectName',
 credit=$credit, lecturer_number=$lecturer_number WHERE subject_id='$subject_id'")or die('error');
 $result2=mysql_query("update subjects set faculty_id=(select f.faculty_id from faculties f where f.faculty_name='$faculty_name') where subject_id='$subject_id'") or die('error in name of faculty');
 $result3=mysql_query("update subjects set course_id=(select c.course_id from courses c where c.course_name='$course_name') where subject_id='$subject_id'") or die('error in course name');
 
?>
<script type="text/javascript">
window.location='updateSubject.php';
</script>
<?php
 }
 ?>
 
 <form name="udatesubmitform" method="post">
 <input type="hidden" name="subject_id" value="<?php echo $subject_id;?>"/>
 <div class="field">
 <label> Subject Name</label>
 <input type="text" name="subject_name" value="<?php echo $subjectName;?>" required/>
 </div>
 <div class="field">
 <label>Credit</label>
 <input type="text" name="credit" value="<?php echo $credit;?>" required/>
 </div>
 <div class="field">
 <label>Faculty Name</label>
 <input type="text" name="faculty_name" value="<?php echo $faculty_name;?>" required/>
 </div>
 <div class="field">
 <label>Course Name</label>
 <input type="text" name="course_name" value="<?php echo $course_name;?>" required/>
 </div>
 <div class="field">
 <label>Lecturer Number</label>
 <input type="text" name="lecturer_number" value="<?php echo $lecturer_number;?>" required/>
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