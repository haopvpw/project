<?php
 
session_start();
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
<h1 style="color:brown;">Lecturer Login Here</h1>
 <?php 
if(isset($_POST['login']))
{
$username=$_POST['lecturer_number'];
$password=$_POST['password'];
$password = addslashes($_POST['password']);
$hash_pass = md5($password.'@^%^TYGHys23233');
$querylogin=mysql_query("SELECT * FROM students WHERE student_number='$username' AND password='$hash_pass'")or die(mysql_error);
if(mysql_num_rows($querylogin))
{
$row=mysql_fetch_array($querylogin);
$_SESSION['username']=$row['name'];
$_SESSION['student_number']=$row['student_number'];

 ?>
 <script type="text/javascript">
 window.location='admin.php';
 </script>
 <?php
}else
{
$error="Registration and Password is not Match please try again";
}
}
?>
  <form name="login" method="post">
  <div class="field">
  <label>Student Number</label>
  <input type="text" name="lecturer_number">
  </div>
  <div class="field">
  <label>Password</label>
  <input type="password" name="password"/>
  </div>
  <div class="loginbutton">
  <input type="submit" name="login" value="LOGIN"/>
  <input type="reset" name="reset" value="RESET"/>
 
 </div>
 <div class="error"><font color="red">
 <?php echo $error;?></font>
 </div>
  </form>

  </div>


<!-- footer -->
<?php include_once('include/footer.php');?>

</div>
</div>
</body>
</html>