 
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
 $lecturer_number=$_GET['lecturer_number'];
 $query=mysql_query("select * from lecturers where lecturer_number='$lecturer_number'")or die(mysql_error);
 while($rowfetch=mysql_fetch_array($query))
 {
 $lecturer_number=$rowfetch['lecturer_number'];
 $lecturerName=$rowfetch['name'];
 $lecturerSurname=$rowfetch['surname'];
 $dob=$rowfetch['date_of_birth'];
 $mobile=$rowfetch['mobile'];
 $email=$rowfetch['email'];
 
 }
 
 if(isset($_POST['updatesubmit']))
 {
 $lecturer_number=$_POST['lecturer_number'];
 $lecturerName=$_POST['name'];
 $lecturerSurname=$_POST['surname'];
 $dob=$_POST['date_of_birth'];
 $mobile=$_POST['mobile'];
 $email=$_POST['email'];

 
 $result1=mysql_query("UPDATE lecturers SET name='$lecturerName',surname='$lecturerSurname', date_of_birth='$dob', mobile='$mobile', email='$email' WHERE lecturer_number='$lecturer_number'")or die(mysql_error);
 
?>
<script type="text/javascript">
window.location='updateTeacher.php';
</script>
<?php
 }
 ?>
 
 <form name="udatesubmitform" method="post">
 <input type="hidden" name="lecturer_number" value="<?php echo $lecturer_number;?>"/>
 <div class="field">
 <label>Name</label>
 <input type="text" name="name" value="<?php echo $lecturerName;?>" required/>
 </div>
 <div class="field">
 <label>Surname</label>
 <input type="text" name="surname" value="<?php echo $lecturerSurname;?>" required/>
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