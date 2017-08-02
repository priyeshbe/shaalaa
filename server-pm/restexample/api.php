<?php
/*
http://www.tutorialsface.com/2016/02/simple-php-mysql-rest-api-sample-example-tutorial/
http://www.c-sharpcorner.com/UploadFile/528a80/create-rest-api-for-android-app-using-php-and-mysql/
*/
require_once("Rest.inc.php");

class API extends REST {

    public $data = "";
    //Enter details of your database
    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "root";
    const DB = "shaalaa";

    private $db = "SELECT * FROM buslocation";

    public function __construct(){
        parent::__construct();              // Init parent contructor
        $this->dbConnect();                 // Initiate Database connection
}

private function dbConnect(){
          $this->db = mysqli_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD);
        if($this->db)
            mysqli_select_db(self::DB,$this->db);
}

    /*
     * Public method for access api.
     * This method dynmically call the method based on the query string
     *
     */
public function processApi(){
        $func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
        if((int)method_exists($this,$func) > 0)
            $this->$func();
        else
            $this->response('Error code 404, Page not found',404);   // If the method not exist with in this class, response would be "Page not found".
}
private function hello(){
    echo str_replace("this","that","HELLO WORLD!!");

}


private function test(){
    // Cross validation if the request method is GET else it will return "Not Acceptable" status

    if($this->get_request_method() != "GET"){
        $this->response('',406);
    }
    $myDatabase= $this->db;// variable to access your database

    $param=$this->_request['var'];

    // If success everythig is good send header as "OK" return param
    $this->response($param, 200);
}


    /*
     *  Encode array into JSON
    */
    private function json($data){
        if(is_array($data)){
            return json_encode($data);
        }
    }
}

    // Initiiate Library

    $api = new API;
    $api->processApi();
?>
