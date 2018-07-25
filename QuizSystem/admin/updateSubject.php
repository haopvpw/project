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
 $query=mysql_query("select s.*, f.faculty_name, c.course_name from subjects s, faculties f, courses c where c.course_id=s.course_id and f.faculty_id=s.faculty_id")or die(mysql_error);
 while($rowfetch=mysql_fetch_array($query))
 {
 ?>
<div class="admin-here">
<div class="data">
<?php echo $rowfetch['subject_name'];
?>
</div>
<div class="data">
<?php echo $rowfetch['credit'];
?>
</div>
<div class="data">
<?php echo $rowfetch['faculty_name'];
?>
<div class="data">
<?php echo $rowfetch['course_name'];
?>
</div>
<div class="data">
<?php echo $rowfetch['lecturer_number'];
?>
</div>
</div>
<div class="data">
<a href="editSubject.php?subject_id=<?php echo $rowfetch['subject_id'];?>">Edit</a>
</div>
<div class="data">
<a href="deleteSubject.php?subject_id=<?php echo $rowfetch['subject_id'];?>">Delete</a>
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