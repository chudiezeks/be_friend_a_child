<?php

//create a class MySQLDao
//creat object-level variables to hold needed details

class MySQLDao {
var $dbhost = null; //the name of the host
var $dbuser = null; //the database username
var $dbpass = null; //the database password
var $conn = null; //an instance of the connection object
var $dbname = null; //the database name
var $result = null;

//create constructor for the class; initialising the host, username, password, and database name
function_construct() {
$this->dbhost = Conn::$dbhost;
$this->dbuser = Conn::$dbuser;
$this->dbpass = Conn::$dbpass;
$this->dbname = Conn::$dbname;
}

//this method is used to connect to the database 
public function openConnection() {
$this->conn = new mysqli($this->dbhost, $this->dbuser, //create new connection using the host, username,
$this->dbpass, $this->dbname); //...password, and the name of the database
if(mysqli_connect_errno())  //if their was an error during attempt to connect to the database
echo new Exception("Could not establish connection with database");  //print out the following string
}

//this method simply returns the current connection
public function getConnection() {
return $this->conn;

//this shutsdown the connection
public function closeConnection() {
if ($this->conn != null)
$this->conn->close();
}

//this method takes in a string variable for as the user email address
//then returns an array containing the details of the user from the database
public function getUserDetails($email) {
$returnValue = array();
$sql = "select * from users where user_email='" . $email . "'";

$result = $this->conn->query ($sql);
if($result!=null && (mysqli_num_rows($result)>=1)) {
$row = $result->fetch_array(MYSQLI_ASSOC);
if (!empty($row)) {
$returnValue = $row;
}
}
return $returnValue;
}

public function getUserDetailsWithPassword($email, $user-Password) {
$returnValue = array();
$sql = "select id,user_email from users where user_email='" . $email . "' and user_password='" . $userPassword . "'";

$result = $this->conn->query($sql);
if($result != null && (mysql_num_rows($result) >= 1)) {
$row = $result->fetch_array(MYSQLI_ASSOC);
if(!empty($row)) {
$returnValue = $row;
}
}
return $returnValue;
}

public function registerUser($email, $password) {
$sql = "insert into users set user_email=?, user_password=?";
$statement = $this->conn->prepare($sql);

if (!$statement)
throw new Exception(statement->error);

$statement->bind_param("ss", $email, $password);
$returnValue = $statement->execute();

return $returnValue;
}

}
?>
