<?php 
header('Content-Type:text/html; charset=UTF-8');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <style>
  table, th, td {
    border: 0.7px solid black;
  }
  </style>
  </head>
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
  $q = mysql_query("SELECT roa.person_id, p.first_name, p.family_name, p.sex, p.birth_date,  b.street, b.number_in_street, a.number, a.beds, a.rooms, a.space FROM person p JOIN role_on_apartment roa ON p.id = roa.person_id JOIN apartment a ON roa.apartment_id = a.id JOIN building b on b.id = a.building_id  WHERE p.first_name = 'Дарья'  AND p.family_name = 'Соловьёва'");
  echo "<br>SELECT roa.person_id, p.first_name, p.family_name, p.sex, p.birth_date,  b.street, b.number_in_street, a.number, a.beds, a.rooms, a.space FROM person p JOIN role_on_apartment roa ON p.id = roa.person_id JOIN apartment a ON roa.apartment_id = a.id JOIN building b on b.id = a.building_id  WHERE p.first_name = 'Дарья'  AND p.family_name = 'Соловьёва'<br><br>";
  echo "<br><strong>В данном SQL запросе мы выводим id человека, его имя, фамиилию, пол, дату рождения, улица, номер дома, номер квартиры, количество кроватей, комнат и размер квартиры для человека с именем Дарья и фамилией Соловьёва</strong><br><br>";
  $n = mysql_num_rows($q);
  $m = mysql_num_fields($q);
  echo "<table>";
  for ($i = 0; $i < $n; $i++)
  {
    echo "<tr>";
    for ($j = 0; $j < $m; $j++) 
    {
      echo "<td>";
      echo mysql_result($q, $i, $j);
      echo "</td>";
    }
    echo "</tr>";
  }      
  echo "</table>";  

  $q = mysql_query("SELECT DISTINCT person_id, first_name, family_name, sex, apartment_id, building_id, type_name, city, street, number_in_street, document_name FROM guest_document_person_apartment gdpa  WHERE (gdpa.`starting` BETWEEN '2016-06-12 18:00:00' AND '2016-06-13') AND gdpa.building_id = 7");
  echo "<br>SELECT DISTINCT person_id, first_name, family_name, sex, apartment_id, building_id, type_name, city, street, number_in_street, document_name FROM guest_document_person_apartment gdpa  WHERE (gdpa.`starting` BETWEEN '2016-06-12 18:00:00' AND '2016-06-13') AND gdpa.building_id = 7<br><br>";
  echo "<strong> Информация о тех, кто заселился в последние 6 часов 12 июня, а также о месте заселения </strong><br><br>";
  $n = mysql_num_rows($q);
  $m = mysql_num_fields($q);
  echo "<table>";
  for ($i = 0; $i < $n; $i++)
  {
    echo "<tr>";
    for ($j = 0; $j < $m; $j++) 
    {
      echo "<td>";
      echo mysql_result($q, $i, $j);
      echo "</td>";
    }
    echo "</tr>";
  }      
  echo "</table>";
  

  $q = mysql_query("SELECT COUNT( DISTINCT gdpa.guest_id) FROM guest_document_person_apartment gdpa  WHERE gdpa.ending > ADDDATE(NOW(), INTERVAL -30 DAY)");
  echo "<br>SELECT COUNT( DISTINCT gdpa.guest_id) FROM guest_document_person_apartment gdpa  WHERE gdpa.ending > ADDDATE(NOW(), INTERVAL -30 DAY)<br><br>";
  echo "<strong>Количество гостей, побывавших в общежитии за последние 30 дней</strong><br><br>";
  $n = mysql_num_rows($q);
  $m = mysql_num_fields($q);
  echo "<table>";
  for ($i = 0; $i < $n; $i++)
  {
    echo "<tr>";
    for ($j = 0; $j < $m; $j++) 
    {
      echo "<td>";
      echo mysql_result($q, $i, $j);
      echo "</td>";
    }
    echo "</tr>";
  }      
  echo "</table>";  

    $q = mysql_query("SELECT * FROM apartment a JOIN role_on_apartment roa ON a.id = roa.apartment_id JOIN person p ON roa.person_id = p.id WHERE a.building_id = 3 AND a.number = 128");
  echo "<br>SELECT * FROM apartment a JOIN role_on_apartment roa ON a.id = roa.apartment_id JOIN person p ON roa.person_id = p.id WHERE a.building_id = 3 AND a.number = 128<br><br>";
  echo "<strong>Вывод информации о студентах, проживающих в 3 общежитии в 128 квартире</strong><br><br>";
  $n = mysql_num_rows($q);
  $m = mysql_num_fields($q);
  echo "<table>";
  for ($i = 0; $i < $n; $i++)
  {
    echo "<tr>";
    for ($j = 0; $j < $m; $j++) 
    {
      echo "<td>";
      echo mysql_result($q, $i, $j);
      echo "</td>";
    }
    echo "</tr>";
  }      
  echo "</table>";  

    $q = mysql_query("SELECT * FROM apartment a JOIN role_on_apartment roa ON a.id = roa.apartment_id JOIN person p ON roa.person_id = p.id WHERE a.building_id = 3 AND roa.`starting` BETWEEN '2016-06-06' AND '2016-06-13'");
  echo "<br>SELECT * FROM apartment a JOIN role_on_apartment roa ON a.id = roa.apartment_id JOIN person p ON roa.person_id = p.id WHERE a.building_id = 3 AND roa.`starting` BETWEEN '2016-06-06' AND '2016-06-13'<br><br>";
  echo "<strong> Вывод информации о студентах, которые заселились в 3 общежитие между 6.06.2016 и 13.06.2016.</strong><br><br>";
  $n = mysql_num_rows($q);
  $m = mysql_num_fields($q);
  echo "<table>";
  for ($i = 0; $i < $n; $i++)
  {
    echo "<tr>";
    for ($j = 0; $j < $m; $j++) 
    {
      echo "<td>";
      echo mysql_result($q, $i, $j);
      echo "</td>";
    }
    echo "</tr>";
  }      
  echo "</table>";  


  $q = mysql_query("SELECT * FROM person p  WHERE MONTH(p.birth_date) = MONTH(NOW()) AND DAYOFMONTH(p.birth_date) = DAYOFMONTH(NOW())");
  echo "<br>SELECT * FROM person p  WHERE MONTH(p.birth_date) = MONTH(NOW()) AND DAYOFMONTH(p.birth_date) = DAYOFMONTH(NOW())<br><br>";
  echo "<strong> Выводим информацию о студентах/работниках, имеющих сегодня день рождения.</strong><br><br>";
  $n = mysql_num_rows($q);
  $m = mysql_num_fields($q);
  echo "<table>";
  for ($i = 0; $i < $n; $i++)
  {
    echo "<tr>";
    for ($j = 0; $j < $m; $j++) 
    {
      echo "<td>";
      echo mysql_result($q, $i, $j);
      echo "</td>";
    }
    echo "</tr>";
  }      
  echo "</table>";  



    $q = mysql_query("SELECT e.first_name, e.family_name, e.role_name, e.`starting` FROM employee e  WHERE e.building_id = 8 AND (e.`starting` BETWEEN '2016-05-01 00:00:00' AND '2016-06-01 00:00:00')");
  echo "<br>SELECT e.first_name, e.family_name, e.role_name, e.`starting` FROM employee e  WHERE e.building_id = 8 AND (e.`starting` BETWEEN '2016-05-01 00:00:00' AND '2016-06-01 00:00:00')<br><br>";
  echo "<strong>Выводим имена сотрудников и их роль, которые начали работать в мае 2016 года.</strong><br><br>";
  $n = mysql_num_rows($q);
  $m = mysql_num_fields($q);
  echo "<table>";
  for ($i = 0; $i < $n; $i++)
  {
    echo "<tr>";
    for ($j = 0; $j < $m; $j++) 
    {
      echo "<td>";
      echo mysql_result($q, $i, $j);
      echo "</td>";
    }
    echo "</tr>";
  }      
  echo "</table>";  





    $q = mysql_query("SELECT COUNT( DISTINCT gdpa.person_id) FROM guest_document_person_apartment gdpa WHERE gdpa.building_id = 6 AND gdpa.sex = 'Ж'");
  echo "<br>SELECT COUNT( DISTINCT gdpa.person_id) FROM guest_document_person_apartment gdpa WHERE gdpa.building_id = 6 AND gdpa.sex = 'Ж'<br><bcompiler_read(filehandle)>";
  echo "<strong>Количество девушек, проживающих в 6 общежитии</strong><br><br>";
  $n = mysql_num_rows($q);
  $m = mysql_num_fields($q);
  echo "<table>";
  for ($i = 0; $i < $n; $i++)
  {
    echo "<tr>";
    for ($j = 0; $j < $m; $j++) 
    {
      echo "<td>";
      echo mysql_result($q, $i, $j);
      echo "</td>";
    }
    echo "</tr>";
  }      
  echo "</table>";  

  mysql_close($db);

?>
    <p><a href = "index.php">Назад</a>


    <form action="action_page.php">
  <textarea name="message" rows="10" cols="100">Here you can write SQL queries for our database.</textarea>
  <br>
  <input type="submit">
</form>
  </body>


</html>
