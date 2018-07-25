<?php include_once('include/header.php');?>
<body>
<div class="wrapper">
<div class="container">
<?php include_once('include/header1.php');?>

<!-- menu -->
<?php include_once('include/menu.php');?>

 <!-- component  -->
<?php
if(isset($_POST['add']))
{
include ('db.php');
$lecturerName=$_POST['lecturerName'];
$lecturerSurname=$_POST['lecturerSurname'];
$lecturerNumber=$_POST['lecturerNumber'];
$password=$_POST['password'];
$dob=$_POST['dob'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$password = addslashes($_POST['password']);
$hash_pass = md5($password.'@^%^TYGHys23233');
$add=mysql_query("INSERT INTO lecturers(lecturer_number, name, surname, date_of_birth, mobile, email,  password) 
values('$lecturerNumber','$lecturerName','$lecturerSurname','$dob','$mobile', '$email','$hash_pass')")or die(mysql_error);
?>
<script type="text/javascript">
window.location="thank-reg.php";
</script>
<?php 
}
?>
 <div class="registrationcomponent">
 <div class="innerform">
 <form name="registrationform" method="post" onsubmit="return validate()">
 <div class="field">
 <label>Name of Lecturer </label>
 <input type="text" name="lecturerName">
 </div>
 <div class="field">
 <label>Surname of Lecturer</label>
 <input type="text" name="lecturerSurname">
 </div>
 <div class="field">
 <label>Lecturer Number</label>
 <input type="text" name="lecturerNumber">
 </div>
 <div class="field">
 <label>Password </label>
 <input type="password" name="password"/>
 </div>
  <div class="field">
 <label>Repeat Password </label>
 <input type="password" name="rpassword"/>
 </div>
 <div class="field">
 <label>Date Of Birth</label>
 <input type="date" name="dob"/>
 </div>
 <div class="field">
 <label>Mobile</label>
 <input type="text" name="mobile"/>
 </div>
 <div class="field">
 <label>Email</label>
 <input type="text" name="email" onchange="check()"/>
 </div>
 <div class="field">
 
 <div class="button">
 <input type="submit" name="add" value="SUBMIT"/>
 <input type="reset" name="reset" value="RESET"/>
 </div>
 </form>
 <script type="text/javascript">
 function validate() {

if (document.registrationform.lecturerName.value.length==0)
{
alert("Empty Name");
document.registrationform.lecturerName.focus();
return false;

}
else
if (document.registrationform.lecturerSurname.value.length==0)
{
alert("Empty Surname");
document.registrationform.lecturerSurname.focus();
return false;

}
else
if (document.registrationform.lecturerNumber.value.length==0)
{
alert("Empty Student Number");
document.registrationform.lecturerNumber.focus();
return false;

}
else
if (document.registrationform.mobile.value.length==0)
{
alert("Empty Mobile");
document.registrationform.mobile.focus();
return false;

}
else
if (document.registrationform.email.value.length==0)
{
alert("Empty Email");
document.registrationform.email.focus();
return false;
}

else
if (document.registrationform.password.value!=document.registrationform.rpassword.value)
{
alert("Passwords doeasn't match");
document.registrationform.password.focus();
return false;

}


}
function check()
{

if (document.registrationform.email.value.indexOf("@")==-1 || document.registrationform.email.value.indexOf(".")==-1)
{
alert("Enter Valid Email");
document.registrationform.email.focus();
}
           
}
</script>
 </div>
 </div>
<!-- footer -->
<?php include_once('include/footer.php');?>
</div>
</div>
</body>
</html>