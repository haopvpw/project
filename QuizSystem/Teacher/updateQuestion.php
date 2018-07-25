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
 <?php 
 $lecturer_number=$_SESSION['lecturer_number'];
 $query=mysql_query("select * from questions q, quizs q1, subjects s where q.quiz_id=q1.quiz_id and q1.subject_id=s.subject_id and s.lecturer_number=$lecturer_number")or die(mysql_error);
 while($rowfetch=mysql_fetch_array($query))
 {
 ?>
<div class="admin-here">
<div class="data">
<?php echo $rowfetch['question'];
?>
</div>
<div class="data">
<?php echo $rowfetch['answer_a'];
?>
</div>
<div class="data">
<?php echo $rowfetch['answer_b'];
?>
</div>
<div class="data">
<?php echo $rowfetch['answer_c'];?>
</div>
<div class="data">
<?php echo $rowfetch['answer_d'];?>
</div>
<div class="data">
<?php echo $rowfetch['correct_answer'];?>
</div>
<div class="data">
<?php echo $rowfetch['point'];?>
</div>
<div class="data">
<?php echo $rowfetch['quiz_name'];?>
</div>
<div class="data">
<?php echo $rowfetch['subject_name'];?>
</div>
<div class="data">
<a href="editQuestion.php?question_id=<?php echo $rowfetch['question_id'];?>">Edit</a>
</div>
<div class="data">
<a href="deleteQuestion.php?question_id=<?php echo $rowfetch['question_id'];?>">Delete</a>
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