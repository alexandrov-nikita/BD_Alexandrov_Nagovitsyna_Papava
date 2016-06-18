<?php 
header('Content-Type:text/html; charset=UTF-8');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>&#1044;&#1072;&#1085;&#1085;&#1099;&#1077; &#1090;&#1072;&#1073;&#1083;&#1080;&#1094;&#1099;</title>
  </head>
  <body style="background-color:lightblue;">

<?php
  $username = "u567173069_ilona";
  $password = "ololoazaza";
  $hostname = "mysql.hostinger.in";
  $db = mysql_connect($hostname, $username, $password);
  mysql_select_db('u567173069_dorm', $db); 
  mysql_set_charset("utf8");
  $tab = $_GET['table'];
  echo "<h2>Таблица $tab</h2>";
  $q = mysql_query("SHOW TABLES");
  $n = mysql_num_rows($q);
  echo "Другие таблицы: ";
  for ($i = 0; $i < $n; $i++)
  {
    $r = mysql_result($q, $i, 0); 
    echo ' <a href="?table='.$r.'">'.$r."</a> | ";
  }
  $f = mysql_query("SHOW COLUMNS FROM $tab");
  $n = mysql_num_rows($f);
  echo "<table><tr>";
  for ($j = 0; $j < $n; $j++)
  {
    echo "<th>";
    echo mysql_result($f, $j, 0);
    echo "</th>";
  }
  echo "</tr>"; 
  $t = mysql_query("SELECT * from $tab");
  $n = mysql_num_rows($t);
  $m = mysql_num_fields($t);
  for ($i = 0; $i < $n; $i++)
  {
    echo "<tr>";
    for ($j = 0; $j < $m; $j++) 
    {
      echo "<td>";
      echo mysql_result($t, $i, $j);
      echo "</td>";
    }
    echo "</tr>";
  }      
  echo "</table>";
  mysql_close($db);
?>
    <a href = "tables.php">&#1050; &#1089;&#1087;&#1080;&#1089;&#1082;&#1091; &#1090;&#1072;&#1073;&#1083;&#1080;&#1094;</a>
  </body>
</html>