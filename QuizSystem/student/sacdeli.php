
<?php
$run=1;
if (isset($_POST['add']))
$quiz_id=$_POST['rad1'];
include('../db.php');
if($_POST["do"]=="finish")
{
$q=mysql_query("set @i=0");
mysql_query($q);
$query=mysql_query("select @i:=@i+1 as rownum, q.* from questions q where q.quiz_id=1");
$sum=0;

while ($rows=mysql_fetch_array($query))
{

echo $rows['rownum']." ".$rows['question']."<br>";
echo '<input type="radio" name="rad1" value="a">'." ".$rows['answer_a']."<br>";
echo '<input type="radio" name="rad1" value="b">'." ".$rows['answer_b']."<br>";
echo '<input type="radio" name="rad1" value="c">'." ".$rows['answer_c']."<br>";
echo '<input type="radio" name="rad1" value="d">'." ".$rows['answer_d']."<br>";
echo '<input type="submit" name="next" value="Next Question">';
}

}

?>
<form method="post" action="sacdeli.php">
<input type="hidden" name="do" value="finish" />
<input type="hidden" name="rans" value="<?php echo $run;?>" />
<input type="hidden" name="name" value="<?php echo $name;?>" />

<input type="submit" value="Finish Online Test" />
</form>