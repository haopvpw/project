<?php

session_start();
if(!isset($_SESSION['username']) || ($_SESSION['username']==''))
{
header("location:header.php");
}
else
{
if (isset($_POST['add']))
$quiz_id=$_POST['rad1'];
?>
<script language="javascript">

var mins
var secs;

function cd() {
 	mins = 1 * m("5"); // change minutes here
 	secs = 0 + s(":01");
 	redo();
}

function m(obj) {
 	for(var i = 0; i < obj.length; i++) {
  		if(obj.substring(i, i + 1) == ":")
  		break;
 	}
 	return(obj.substring(0, i));
}

function s(obj) {
 	for(var i = 0; i < obj.length; i++) {
  		if(obj.substring(i, i + 1) == ":")
  		break;
 	}
 	return(obj.substring(i + 1, obj.length));
}

function dis(mins,secs) {
 	var disp;
 	if(mins <= 9) {
  		disp = " 0";
 	} else {
  		disp = " ";
 	}
 	disp += mins + " .";
 	if(secs <= 9) {
  		disp += "0" + secs;
 	} else {
  		disp += secs;
 	}
 	return(disp);
}

function redo() {
 	secs--;
 	if(secs == -1) {
  		secs = 59;
  		mins--;
 	}
 	document.cd.disp.value = dis(mins,secs); // setup additional displays here.
 	if((mins == 0) && (secs == 0)) {
  		window.alert(" Hey Time is up. Press OK to continue.");
  		 window.location = "test.php" // redirects to specified page once timer ends and ok button is pressed
 	} else {
 		cd = setTimeout("redo()",1000);
 	}
}

function init() {
  cd();
}
window.onload = init;
</script>
<table>
<tr align="right"><td><form name="cd">
  <label>
  <span class="labe">Remaining Time</span>:
  <input name="disp" type="text" class="clock" id="txt" value="10:00" size="10" readonly="true" align="right" border="1" />
  <span class="labe">Minutes</span>
</form></td></tr>
</table>
<?php
 
 include_once('../db.php'); ?>
 
  <form name="quiz" method="post" action="quiz.php">
<?php if($_POST["do"]=="finish")
{
$rans=$_POST["rans"];
$tq=$_POST["tq"];
$end=$_POST["end"];
$startposition=$_POST["startposition"];
/*echo "<table cellpadding='5px' align='center' style='border:1px solid silver' width='80%'
bgcolor='green'>";
echo "<tr><td>Total Question Attempt</td><td>",$tq,"</td><tr>";
echo "<tr><td>Correct Answer</td><td>",$rans,"</td></tr>";
echo "<tr><td>Wrong Answer</td><td>",$tq-$rans,"</td></tr>";
echo "<tr><td>Correct Answer Percentage</td><td>",$rans/$tq*100,"%</td></tr>";
echo "<tr><td>Wrong Answer Percenntage</td><td>",($tq-$rans)/$tq*100,"%</td></tr>";
echo "</table><br><br>";
$query="select * from quiz where qid<='$end' and qid>='$startposition'";
echo "<table cellpadding='5px' align='center' style='border:1px
solid silver'>";
echo "<tr><th colspan='4' id='heading'>Online Quiz Test
Question</td></tr>";
$result=mysql_query($query);
while ($row = mysql_fetch_array($result)) {
echo "<tr><td>",$row[0],"</td><td colspan='2'>",$row[1],"</td></tr><tr><td></td>";
echo "<td colspan='2'>A. ",$row[2],"</td>";
echo "<td colspan='2'>B. ",$row[3],"</td></tr>";
echo "<tr><td></td><td colspan='2'>C. ",$row[4],"</td>";
echo "<td colspan='1'>D. ",$row[5],"</td></tr>";
echo "<tr><td colspan='4' align='right'
style='color:orange'>Correct option is ",strtoupper($row[6]),"</td></tr>";
echo "<tr><td colspan='4' align='right'
style='color:orange'><hr></td></tr>";
}
echo "</table>";
echo "<p align='right'><a href='#' onclick='window.print()'>Print</a></p>";
echo "<div style='visibility:hidden;display:none'>";*/
}
 
?>
<table cellpadding="5px" width="100%" style="border:1px solid silver">
<?php
$start=$_POST["start"];
$s=$_POST["startposition"];
if($start==NULL)
{
$start=$_GET["start"];
$s=$_GET["start"];
}
$useropt=$_POST["useropt"];
$qid=$_POST["qid"];
$rans=$_POST["rans"];
$name=$_POST["name"];


if($start==NULL)
$quiz_id=$_POST['rad1'];

$q=mysql_query("set $i=0;");
$query="select @i:=@i+1 as rownum, q.* from questions q where q.quiz_id=$quiz_id;";

$result=mysql_query($query);
$totalquestion=0;
while ($row = mysql_fetch_array($result)) 
{
echo "<tr><td>",$row['rownum'],"</td><td colspan='2'>",$row['question'],"</td></tr><tr><td></td><td colspan='2'>
<input type='radio' name='useropt' value='a' /> ",$row['answer_a'],"</td><td colspan='2'>
<input type='radio' name='useropt' value='b' /> ",$row['answer_b'],"</td></tr><tr><td></td><td colspan='2'>
<input type='radio' name='useropt' value='c' /> ",$row['answer_c'],"</td><td colspan='2'><input type='radio' name='useropt' value='d' />
",$row['answer_d'],"</td></tr>";
echo "<tr ><td colspan='5' align='right'>
<input type='hidden' name='name' value='",$name,"'><input type='hidden' name='start' value='",$row['rownum']+1,"'>
<input type='hidden' name='qid' value='",$row['rownum'],"'><input type='hidden' name='startposition' value='",$s,"'>
<input type='submit' value='Next Question'><input type='hidden' name='totalquestion' value='",$totalquestion+1,"'>";
echo "</td></tr>";
}
echo "<tr><td colspan='4'>";
$query="select correct_answer from questions where question_id='$qid'";
$result=mysql_query($query);
while ($row = mysql_fetch_array($result)) {
if(strcmp($row[0],$useropt)==0)
{
echo "<input type='hidden' name='rans' value='",$rans+1,"'>";
$rans=$rans+1;
}
else
echo "<input type='hidden' name='rans' value='",$rans,"'>";
}
echo "</td></tr>";
?>
 
</table>
<center>
<br />
<br />
</form>
<form method="post" action="quiz.php">
<input type="hidden" name="do" value="finish" />
<input type="hidden" name="rans" value="<?php echo $rans;?>" />
<input type="hidden" name="name" value="<?php echo $name;?>" />

<input type="submit" value="Finish Online Test" />
</form>
<?php
}
?>