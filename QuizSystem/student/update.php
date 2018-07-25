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
<center><h1 style="color:brown;">Admin Panel</h1></center>
 <?php 
 $student_number=$_SESSION['student_number'];
 $query=mysql_query("select s.*, f.faculty_name, c.course_name from students s, faculties f, courses c where s.faculty_id=f.faculty_id and s.course_id=c.course_id and s.student_number=$student_number")or die(mysql_error);
 while($rowfetch=mysql_fetch_array($query))
 {
 ?>
<div class="admin-here">
<div class="data">
<?php echo $rowfetch['name'];
?>
</div>
<div class="data">
<?php echo $rowfetch['surname'];
?>
</div>
<div class="data">
<?php echo $rowfetch['student_number'];
?>
</div>
<div class="data">
<?php echo $rowfetch['date_of_birth'];?>
</div>
<div class="data">
<?php echo $rowfetch['mobile'];?>
</div>
<div class="data">
<?php echo $rowfetch['email'];?>
</div>
<div class="data">
<?php echo $rowfetch['faculty_name'];?>
</div>
<div class="data">
<?php echo $rowfetch['course_name'];?>
</div>
<div class="data">
<a href="edit.php?student_number=<?php echo $rowfetch['student_number'];?>">Edit</a>
</div>

</div>
 <?php
 }
 ?>
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