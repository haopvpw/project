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
<h1 style="color:brown;">Lecturer Panel</h1>
<h1 style="color:brown; text-align: center">Subjects</h1>
<ul>
<?php
$lecturer_number=$_SESSION['lecturer_number'];
$subjects=mysql_query("select * from lecturers l, subjects s where l.lecturer_number=s.lecturer_number and s.lecturer_number=$lecturer_number");
while ($row=mysql_fetch_array($subjects))
{


echo "<li>";
echo $row['subject_name'];
echo "</li>";

}
?>
</ul>
<h1 style="color:brown; text-align: center">Quizs</h1>
<ul>
<li><a href="createQuiz.php">Create New Quiz</a></li>
<li><a href="update.php">Update Quiz</a></li>
<li><a href="addQuestion.php">Insert Questions</a></li>
<li><a href="updateQuestion.php">Update Questions</a></li>
<li><a href="results.php">Results</a></li>
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