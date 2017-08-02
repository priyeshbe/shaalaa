<?php
/*
A domain Class to demonstrate RESTful web services

owner site
http://phppot.com/php/php-restful-web-service/

one more example
http://www.c-sharpcorner.com/UploadFile/528a80/create-rest-api-for-android-app-using-php-and-mysql/

*/
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shaalaa";

//   $sql = "SELECT * FROM buslocation";


try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * FROM buslocation");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
}
}
catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}
$conn = null;

Class Mobile {

	private $mobiles = array(
		1 => 'Apple iPhone 6S',
		2 => 'Samsung Galaxy S6',
		3 => 'Apple iPhone 6S Plus',
		4 => 'LG G4',
		5 => 'Samsung Galaxy S6 edge',
		6 => 'OnePlus 2');

	/*
		you should hookup the DAO here
	*/
	public function getAllMobile(){
		return $this->mobiles;
	}

	public function getMobile($id){

		$mobile = array($id => ($this->mobiles[$id]) ? $this->mobiles[$id] : $this->mobiles[1]);
		return $mobile;
	}
}
?>
