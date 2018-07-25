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
<center><h1 style="color:brown;">Lecturer Panel</h1></center>
<a href="results.php">back</a>
<?php
$quiz_id=$_POST['rad1'];
include('../db.php');
$query=mysql_query("select * from scores s, students s1 where s.student_number=s1.student_number and quiz_id=$quiz_id");
echo "<br>";
echo "<ul>";
while ($row=mysql_fetch_array($query))
{
echo "<li>".$row['name']." ".$row['surname']." ".$row['score']."</li>";
}
echo "<ul>";
echo "<p align='right'><a href='#' onclick='window.print()'>Print</a></p>";
echo "<div style='visibility:hidden;display:none'>";
?>

</div>
<?php
}
?>
</div>
</div>