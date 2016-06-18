<?php 
header('Content-Type:text/html; charset=UTF-8');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <style>
  table, th, td {
    border: 0.7px solid black;
  }
  </style>
<body style="background-color:lightblue;">

<?php
	ini_set('default_charset', 'UTF-8');
	setlocale(LC_ALL, 'Russian_Russia.65001');
	$username = "u567173069_ilona";
	$password = "ololoazaza";
	$hostname = "mysql.hostinger.in";
	$db = mysql_connect($hostname, $username, $password);
	mysql_select_db('u567173069_dorm', $db); 
	mysql_set_charset("utf8");
	$q = mysql_query("'set names 'utf8'");
	$value = $_GET["message"];
	$q = mysql_query(stripslashes($value));
	echo "Query:<br>";
	echo $value;
	echo "<br><br><br>";
	$n = mysql_num_rows($q);
	$m = mysql_num_fields($q);
	echo "<table>";
	for ($i = 0; $i < $n; $i++) {
	 	echo "<tr>";
	    for ($j = 0; $j < $m; $j++) {
	      echo "<td>";
	      echo mysql_result($q, $i, $j);
	      echo "</td>";
	    }
	    echo "</tr>";
	  }      
  echo "</table>";  
?>

<p><a href = "queries.php">Назад</a>
</body>
</html> 

