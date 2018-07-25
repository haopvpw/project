 
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
 $student_number=$_GET['student_number'];
 $query=mysql_query("select * from students s, faculties f, courses c where s.faculty_id=f.faculty_id and s.course_id=c.course_id and s.student_number='$student_number'")or die(mysql_error);
 while($rowfetch=mysql_fetch_array($query))
 {
 $student_number=$rowfetch['student_number'];
 $studentName=$rowfetch['name'];
 $studentSurname=$rowfetch['surname'];
 $dob=$rowfetch['date_of_birth'];
 $mobile=$rowfetch['mobile'];
 $email=$rowfetch['email'];
 $faculty_name=$rowfetch['faculty_name'];
 $course_name=$rowfetch['course_name'];
 }
 
 if(isset($_POST['updatesubmit']))
 {
 $student_number=$_POST['student_number'];
 $studentName=$_POST['name'];
 $studentSurname=$_POST['surname'];
 $dob=$_POST['date_of_birth'];
 $mobile=$_POST['mobile'];
 $email=$_POST['email'];
 $faculty_name=$_POST['faculty_name'];
 $course_name=$_POST['course_name'];
 $updataquery=mysql_query("SELECT * FROM students");
 $result1=mysql_query("UPDATE students SET name='$studentName',
 surname='$studentSurname', date_of_birth='$dob', mobile='$mobile', email='$email' WHERE student_number='$student_number'")or die(mysql_error);
 $result2=mysql_query("update students set faculty_id=(select f.faculty_id from faculties f where f.faculty_name='$faculty_name') where student_number='$student_number'") or die('error in name of faculty');
 $result3=mysql_query("update students set course_id=(select c.course_id from courses c where c.course_name='$course_name') where student_number='$student_number'") or die('error in course name');
?>
<script type="text/javascript">
window.location='Update.php';
</script>
<?php
 }
 ?>
 
 <form name="udatesubmitform" method="post">
 <input type="hidden" name="student_number" value="<?php echo $student_number;?>"/>
 <div class="field">
 <label>Name</label>
 <input type="text" name="name" value="<?php echo $studentName;?>" required/>
 </div>
 <div class="field">
 <label>Surname</label>
 <input type="text" name="surname" value="<?php echo $studentSurname;?>" required/>
 </div>
 <div class="field">
 <label>Date of birth</label>
 <input type="text" name="date_of_birth" value="<?php echo $dob;?>" required/>

 </div>
 <div class="field">
 <label>Mobile</label>
 <input type="text" name="mobile" value="<?php echo $mobile;?>" required/>
 </div>
 <div class="field">
 <label>Email</label>
 <input type="text" name="email" value="<?php echo $email;?>" required/>
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