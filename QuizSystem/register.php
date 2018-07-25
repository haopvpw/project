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
$studentName=$_POST['studentName'];
$studentSurname=$_POST['studentSurname'];
$studentNumber=$_POST['studentNumber'];
$password=$_POST['password'];
$dob=$_POST['dob'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$facultyName=$_POST['rad1'];
$courseName=$_POST['rad2'];
$password = addslashes($_POST['password']);
$hash_pass = md5($password.'@^%^TYGHys23233');
$add=mysql_query("INSERT INTO students(student_number, name, surname, date_of_birth, mobile, email, faculty_id, course_id, password) 
values('$studentNumber','$studentName','$studentSurname','$dob','$mobile', '$email','$facultyName','$courseName','$hash_pass')")or die(mysql_error);
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
 <label>Name of Student </label>
 <input type="text" name="studentName">
 </div>
 <div class="field">
 <label>Surname of Student</label>
 <input type="text" name="studentSurname">
 </div>
 <div class="field">
 <label>Student Number</label>
 <input type="text" name="studentNumber">
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
 <label>Choose Faculty</label>
 <?php
include ('db.php');
$query="select * from faculties";
$run=mysql_query($query);
$i=0;
echo "<br>";
while($rows=mysql_fetch_array($run))
{
$i++;
echo '<input type="radio" name="rad1" value="'.$rows['faculty_id'].'">'.' '.$rows['faculty_name']."<br>";
}

?>
</div>
 <div class="field">
 <label>Choose Course</label>
 <?php
 include ('db.php');

 $query="select * from courses";
 $run=mysql_query($query);
 $i=0;
 echo "<br>";
 while ($rows=mysql_fetch_array($run))
 {
 $i++;
  echo '<input type="radio" name="rad2" value="'.$rows['course_id'].'">'." ".$rows['course_name']."<br>";
  }
 ?>
 </div>
 <div class="button">
 <input type="submit" name="add" value="SUBMIT"/>
 <input type="reset" name="reset" value="RESET"/>
 </div>
 </form>
 <script type="text/javascript">
 function validate() {

if (document.registrationform.studentName.value.length==0)
{
alert("Empty Name");
document.registrationform.studentName.focus();
return false;

}
else
if (document.registrationform.studentSurname.value.length==0)
{
alert("Empty Surname");
document.registrationform.studentSurname.focus();
return false;

}
else
if (document.registrationform.studentNumber.value.length==0)
{
alert("Empty Student Number");
document.registrationform.studentNumber.focus();
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
else
if (document.registrationform.rad1.value=="")
{
alert("Please Check the faculty");

return false;

}
else
if (document.registrationform.rad2.value=="")
{
alert("Please Check the course");

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