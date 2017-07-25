<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shaalaa";

   try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "DROP TABLE buslocation";
      $conn->exec($sql);

      // sql to create table
      $sql = "CREATE TABLE buslocation (
       busno TINYINT(1) NOT NULL,
       lat DECIMAL(9,6) NOT NULL,
       lng DECIMAL(9,6) NOT NULL
      )";

      // use exec() because no results are returned
      $conn->exec($sql);
      echo "<br>Table buslocation created successfully";
      }
   catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

$conn = null;
?>
