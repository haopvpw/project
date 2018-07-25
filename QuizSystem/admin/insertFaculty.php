
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
$faculty_name=$_POST['faculty_name'];
$add=mysql_query("insert into faculties (faculty_name) values ('$faculty_name')") or die(mysql_error);
}
?>


 <div class="registrationcomponent">
 <div class="innerform">
 <form name="registrationform" method="post">
 <div class="field">
 <label>Faculty Name </label>
 <input type="text" name="faculty_name">
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
