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
		<h1>Quiz Questions</h1>
		
		<form action="grade.php" method="post" id="quiz">
		
            <ol>
            
               
                
                  <?php 
				  session_start();
				  $quiz_id=$_POST['rad1'];
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
$q=mysql_query("set @i=0;");
$quer=mysql_query("select @i:=@i+1 as rownum, q.* from questions q where q.quiz_id=$quiz_id");
while ($row=mysql_fetch_array($quer))
{
    echo "<li>";
	echo "<h3>".$row['question']."<h3>";
	echo '<div><input type="radio" name="'.$row['rownum'].'" value="a">'.'<label for="question"> a) '.$row['answer_a'].'</label></div>';
	echo '<div><input type="radio" name="'.$row['rownum'].'" value="b">'.'<label for="question"> b) '.$row['answer_b'].'</label></div>';
	echo '<div><input type="radio" name="'.$row['rownum'].'" value="c">'.'<label for="question"> c) '.$row['answer_c'].'</label></div>';
	echo '<div><input type="radio" name="'.$row['rownum'].'" value="d">'.'<label for="question"> d) '.$row['answer_d'].'</label></div>';
	echo "</li>";
}
?>

                
              
            
            </ol>
            
            <input type="submit" value="Submit Quiz" />
		<input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>"/>
		</form>
	
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