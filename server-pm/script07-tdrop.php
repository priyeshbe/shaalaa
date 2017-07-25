<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shaalaa";

   try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // sql to delete table
      $sql = "DROP TABLE businfo";
      $conn->exec($sql);
      $sql = "DROP TABLE buslocation";
      $conn->exec($sql);

      echo "<br>Tables businfo and buslocation deleted successfully";
      }
   catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

$conn = null;
?>
