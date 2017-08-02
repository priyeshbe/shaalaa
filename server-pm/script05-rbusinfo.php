<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "school";

try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "INSERT INTO businfo (busno, busroute, drivername, drivermobile)
   VALUES ('1', '5', 'Manoj', '9889988998')";
   // use exec() because no results are returned
   $conn->exec($sql);

   $sql = "INSERT INTO businfo (busno, busroute, drivername, drivermobile)
   VALUES ('2', '7', 'Anna', '9889988999')";
   // use exec() because no results are returned
   $conn->exec($sql);

   $sql = "INSERT INTO businfo (busno, busroute, drivername, drivermobile)
   VALUES ('3', '8', 'DJ', '9889988997')";
   // use exec() because no results are returned
   $conn->exec($sql);
   echo "New record created successfully";
   }
catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }

$conn = null;
?>
