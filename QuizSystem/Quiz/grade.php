<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Quiz</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

	<div id="page-wrap">

		<h1>Quiz Result</h1>
		
        <?php
            
			
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

$i=0;
$sum=0;
$quer=mysql_query("select @j:=@j+1 as rownum, q.* from questions q where q.quiz_id=1");
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