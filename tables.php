<?php 
header('Content-Type:text/html; charset=UTF-8');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Список таблиц</title>
  <style>
  table, th, td {
    border: 0.7px solid black;
  }
  </style>
  </head>
  <body style="background-color:lightblue;">

<?php
  $username = "u567173069_ilona";
  $password = "ololoazaza";
  $hostname = "mysql.hostinger.in";
  $db = mysql_connect($hostname, $username, $password);
  mysql_select_db('u567173069_dorm', $db); 
  mysql_set_charset("utf8");
  echo "<h2>Список таблиц</h2>";
  $q = mysql_query("SHOW TABLES");
  $n = mysql_num_rows($q);
  for ($i = 0; $i < $n; $i++)
  {
     $r = mysql_result($q, $i, 0); 
     echo "<center><h2>$r</h2></center>";
     echo '<a href="data.php?table='.$r.'"><h3>Данные</h3></a>';
     $f = mysql_query("SHOW COLUMNS FROM $r");
     $k = mysql_num_rows($f);
     $m = mysql_num_fields($f);
     echo "<table>";
     echo "<tr><th>Имя</th><th>Тип</th><th>Null</th><th>Ключ</th><th>Default</th><th>Другое</th></tr>";
     for ($e = 0; $e < $k; $e++)
     {
       echo "<tr>";
       for ($j = 0; $j < $m; $j++)
       {
         echo "<td>";
         echo mysql_result($f, $e, $j);
         echo "</td>";
       }
       echo "</tr>";
     }
     echo "</table>";
	 //echo "---------------------------------------------------------------------------------------------------------------------------------------------------------";
  } 
  mysql_close($db);
?>
<br><a href = "index.php">Назад</a>
  </body>
</html>