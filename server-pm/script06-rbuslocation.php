<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shaalaa";

try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $sql = "INSERT INTO buslocation (busno, lat, lng)
   VALUES ('1', '19.052996', '73.073255')";
   // use exec() because no results are returned
   $conn->exec($sql);

   $sql = "INSERT INTO buslocation (busno, lat, lng)
   VALUES ('2', '19.052996', '73.073255')";
   // use exec() because no results are returned
   $conn->exec($sql);

   $sql = "INSERT INTO buslocation (busno, lat, lng)
   VALUES ('3', '19.052996', '-116.360066')";
   // use exec() because no results are returned
   $conn->exec($sql);

   echo "Bus location school point dummy records created successfully";
   }
catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }

$conn = null;
?>
