<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shaalaa";

try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $sql = "DROP TABLE businfo";
   $conn->exec($sql);
   
   // sql to create table
   $sql = "CREATE TABLE businfo (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    busno TINYINT(1) NOT NULL,
    busroute TINYINT(1) NOT NULL,
    drivername VARCHAR(20) NOT NULL,
    drivermobile VARCHAR(10) NOT NULL
   )";

   // use exec() because no results are returned
   $conn->exec($sql);
   echo "<br>Table businfo created successfully";
   }
catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }

$conn = null;
?>
