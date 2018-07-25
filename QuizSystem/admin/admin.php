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
<a href="logout.php">Logout</a>
<h1 style="color:brown;">Admin Panel</h1>
<ul>
<li>
<a href="update.php">Update Student Here</a>     
</li>

<li><a href="updateTeacher.php">Update Lecturers Here</a></li>

<li><a href="updateCourse.php">Update Courses Here<a></li>
<li><a href="insertCourse.php">Insert Courses Here</a></li>
<li><a href="updateFaculty.php">Update Faculties Here<a></li>
<li><a href="insertFaculty.php">Insert Faculties Here</a></li>
<li><a href="updateSubject.php">Update Subjects Here</a></li>
<li><a href="insertSubject.php">Insert Subjects Here</a></li>
</ul>
</div>


<!-- footer here -->
<?php include_once('include/footer.php');?>

</div>
</div>
<?php
}
?>
</body>
</html>