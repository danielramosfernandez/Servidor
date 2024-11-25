<?php // query-mysqli.php
 require_once 'login.php';
 $connection = new mysqli($hn, $un, $pw, $db);
 if ($connection->connect_error) die("Fatal Error");
 $query = "SELECT * FROM usuarios";
 $result = $connection->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows;
 for ($j = 0 ; $j < $rows ; ++$j)
 {
 $result->data_seek($j);
 echo 'Id: ' .htmlspecialchars($result->fetch_assoc()['Id']) .'<br>';
 $result->data_seek($j);
 echo 'Usuario: ' .htmlspecialchars($result->fetch_assoc()['Usu']) .'<br>';
 $result->data_seek($j);
 echo 'Contraseña: ' .htmlspecialchars($result->fetch_assoc()['contra']) .'<br>';
 $result->data_seek($j);
 echo 'Rol: '. htmlspecialchars($result->fetch_assoc()['Rol'])
.'<br>';
 }  $result->close();
 $connection->close();
?>