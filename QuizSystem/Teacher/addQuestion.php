<?php include_once('include/header.php');?>

<body>
<div class="wrapper">
<div class="container">
<?php include_once('include/header1.php');?>
<?php
if(isset($_POST['add']))
{
include ('../db.php');
$question=$_POST['question'];
$answer_a=$_POST['answer_a'];
$answer_b=$_POST['answer_b'];
$answer_c=$_POST['answer_c'];
$answer_d=$_POST['answer_d'];
$correctAnswer=$_POST['correct_answer'];
$point=$_POST['point'];
$quiz_id=$_POST['rad1'];

$add=mysql_query("INSERT INTO questions (question, answer_a, answer_b, answer_c, answer_d, correct_answer, point, quiz_id) values('$question','$answer_a','$answer_b','$answer_c', '$answer_d','$correctAnswer','$point', $quiz_id)")or die(mysql_error);
?>

<?php 
}
?>
 <div class="registrationcomponent">
 <div class="innerform">
 <form name="registrationform" method="post">
 <div class="field">
 <label>Question </label>
 <input type="text" name="question">
 </div>
 <div class="field">
 <label>Answer A</label>
 <input type="text" name="answer_a">
 </div>
 <div class="field">
 <label>Answer B</label>
 <input type="text" name="answer_b">
 </div>
 <div class="field">
 <label>Answer C</label>
 <input type="text" name="answer_c"/>
 </div>
 <div class="field">
 <label>Answer D</label>
 <input type="text" name="answer_d"/>
 </div>
 <div class="field">
 <label>Correct Answer</label>
 <select name="correct_answer" id="gunjan-textbox">
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
<option value="d">D</option>
</select>
 </div>
 <div class="field">
 <label>Point</label>
 <input type="text" name="point"/>
 </div>

 <div class="field">
 <label>Choose Question</label>
 <?php
 include('../db.php');
  session_start();
 $lecturer_id=$_SESSION['lecturer_number'];
 //$query=mysql_query("select * from quizs q, subjects s, faculties f, courses c where q.subject_id=s.subject_id and q.faculty_id=f.faculty_id and q.course_id=c.course_id and s.lecturer_number=$lecturer_id") or die(mysql_error);
 $run=mysql_query("select * from quizs q, subjects s, faculties f, courses c where q.subject_id=s.subject_id and q.faculty_id=f.faculty_id and q.course_id=c.course_id and s.lecturer_number=$lecturer_id");
 $i=0;
 echo "<br>";
 while ($rows=mysql_fetch_array($run))
 {
 $i++;
  echo '<input type="radio" name="rad1" value="'.$rows['quiz_id'].'">'." ".$rows['quiz_name']." ".$rows['subject_name']." ".$rows['faculty_name']." ".$rows['course_name']."<br>";
  }
 ?>
 </div>
 <div class="button">
 <input type="submit" name="add" value="SUBMIT"/>
 <input type="reset" name="reset" value="RESET"/>
 </div>
 <a href="admin.php">Back</a>
 </form>
 </div>
 </div>
<!-- footer -->
<?php include_once('include/footer.php');?>
</div>
</div>

</body>
</html>