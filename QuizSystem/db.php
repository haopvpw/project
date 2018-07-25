<?php 
$host="localhost";
$user="root";
$password="";
$databaseName="QuizSystem";
$connection=mysql_connect($host,$user,$password);
if (!$connection)
{
echo "Database Connection is failed";
}
else
{
$query=mysql_select_db($databaseName);
}
?>


