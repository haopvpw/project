 
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
 $course_id=$_GET['course_id'];
 $query=mysql_query("select * from courses where course_id='$course_id'")or die(mysql_error);
 while($rowfetch=mysql_fetch_array($query))
 {
 $course_name=$rowfetch['course_name'];
 }
 
 if(isset($_POST['updatesubmit']))
 {
$course_name=$_POST['course_name'];
$result=mysql_query("update courses set course_name='$course_name' where course_id=$course_id") or die(mysql_error);
 
?>
<script type="text/javascript">
window.location='updateCourse.php';
</script>
<?php
 }
 ?>
 
 <form name="udatesubmitform" method="post">
 
 <div class="field">
 <label>Course Name</label>
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