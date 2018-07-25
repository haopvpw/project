 
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
<center><h1 style="color:brown;">Lecturer Panel</h1></center>
 <?php 
 $question_id=$_GET['question_id'];
 $query=mysql_query("select * from questions q, quizs q1, subjects s where q.quiz_id=q1.quiz_id and q1.subject_id=s.subject_id and q.question_id=$question_id")or die(mysql_error);
 while($rowfetch=mysql_fetch_array($query))
 {
 $question=$rowfetch['question'];
 $answer_a=$rowfetch['answer_a'];
 $answer_b=$rowfetch['answer_b'];
 $answer_c=$rowfetch['answer_c'];
 $answer_d=$rowfetch['answer_d'];
 $correctAnswer=$rowfetch['correct_answer'];
 $point=$rowfetch['point'];
 $quiz_name=$rowfetch['quiz_name'];
 $subject=$rowfetch['subject_name'];
 }
 
 if(isset($_POST['updatesubmit']))
 {
 $question=$_POST['question'];
 $answer_a=$_POST['answer_a'];
 $answer_b=$_POST['answer_b'];
 $answer_c=$_POST['answer_c'];
 $answer_d=$_POST['answer_d'];
 $correctAnswer=$_POST['correct_answer'];
 $point=$_POST['point'];
 $quiz_name=$_POST['quiz_name'];
 $subject=$_POST['subject'];
 
 $result1=mysql_query("UPDATE questions  SET question='$question', answer_a='$answer_a', answer_b='$answer_b', answer_c='$answer_c', answer_d='$answer_d',
correct_answer='$correctAnswer', point=$point WHERE question_id=$question_id")or die(mysql_error);
 $result2=mysql_query("update questions set quiz_id=(select q.quiz_id from quizs q, subjects s where q.quiz_name='$quiz_name' and s.subject_name='$subject' and q.subject_id=s.subject_id) WHERE question_id=$question_id") or die('error');
 
?>
<script type="text/javascript">
window.location='updateQuestion.php';
</script>
<?php
 }
 ?>
 
 <form name="udatesubmitform" method="post">
 <input type="hidden" name="question_id" value="<?php echo $question_id;?>"/>
 <div class="field">
 <label>Question</label>
 <input type="text" name="question" value="<?php echo $question;?>" required/>
 </div>
 <div class="field">
 <label>Answer a </label>
 <input type="text" name="answer_a" value="<?php echo $answer_a;?>" required/>
 </div>
 <div class="field">
 <label>Answer b</label>
 <input type="text" name="answer_b" value="<?php echo $answer_b;?>" required/>
 </div>
 <div class="field">
 <label>Answer c</label>
 <input type="text" name="answer_c" value="<?php echo $answer_c;?>" required/>
 </div>
 <div class="field">
 <label>Answer d</label>
 <input type="text" name="answer_d" value="<?php echo $answer_d;?>" required/>
 </div>
 <div class="field">
 <label>Correct Answer</label>
 <input type="text" name="correct_answer" value="<?php echo $correctAnswer;?>" required/>
 </div>
 <div class="field">
 <label>Point</label>
 <input type="text" name="point" value="<?php echo $point;?>" required/>
 </div>
 <div class="field">
 <label>Quiz</label>
 <input type="text" name="quiz_name" value="<?php echo $quiz_name;?>" required/>
 </div>
 <div class="field">
 <label>Subect</label>
 <input type="text" name="subject" value="<?php echo $subject;?>" required/>
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