<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Quiz</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

	<div id="page-wrap">
    <a href="admin.php">Back</a>
		<h1>Quiz Result</h1>
		
        <?php
            
			session_start();
			$host="localhost";
$user="root";
$password="";
$databaseName="web_project";
$connection=mysql_connect($host,$user,$password);
if (!$connection)
{
echo "Database Connection is failed";
}
else
{
$query=mysql_select_db($databaseName);
}
$totalCorrect=0;
$query=mysql_query("set @j=0");
$quiz_id=$_POST['quiz_id'];
$i=0;
$sum=0;
$quer=mysql_query("select @j:=@j+1 as rownum, q.* from questions q where q.quiz_id=$quiz_id");
while ($row=mysql_fetch_array($quer))
{
$i++;
$str=$row['rownum'];
$answer=$_POST[$str];
if ($row['correct_answer']==$answer)
{
$totalCorrect++;
$sum+=$row['point'];
}

}
			
			
			
         
            
            echo "<div id='results'>$totalCorrect / $i correct and score is $sum</div>";
			$student_number=$_SESSION['student_number'];
			$insert=mysql_query("insert into scores(student_number, quiz_id, score) values ($student_number, $quiz_id, $sum);");
			
			$newquery=mysql_query("select * from questions q where q.quiz_id=$quiz_id");
			$cnt=0;
			echo "<h1>Quiz Questions with Correct Answers</h1>";
			echo "<ol>";
			while($row=mysql_fetch_array($newquery))
			{
			    echo "<li>";
	echo "<h3>".$row['question']."<h3>";
	echo '<div><label for="question"> a) '.$row['answer_a'].'</label></div>';
	echo '<div><label for="question"> b) '.$row['answer_b'].'</label></div>';
	echo '<div><label for="question"> c) '.$row['answer_c'].'</label></div>';
	echo '<div><label for="question"> d) '.$row['answer_d'].'</label></div>';
	echo '<div style="color: red"><label for="correct"> correct answer is '.$row['correct_answer'];
	echo "</li>";
			}
			echo "</ol>";
            echo "<p align='right'><a href='#' onclick='window.print()'>Print</a></p>";
            echo "<div style='visibility:hidden;display:none'>";
        ?>
	
	</div>
	
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	var pageTracker = _gat._getTracker("UA-68528-29");
	pageTracker._initData();
	pageTracker._trackPageview();
	</script>

</body>

</html>