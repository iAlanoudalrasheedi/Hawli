<?php
$dbserver="localhost";
$dbusername="root";
$dbpassword="root";
$dbname="it390_hawli";

$conn=false;
$message = "";

function conndb() {
	global $conn, $dbserver, $dbname, $dbpassword, $dbusername;
    global $message;
	
	$conn = mysqli_connect($dbserver, $dbusername, $dbpassword);

	if (!$conn)
         $message = "Cannot connect to server";
	else if (!@mysqli_select_db($conn, $dbname))
		$message = "Cannot select database";
	
	if ($message)
		die($message);


	$conn->query("SET NAMES 'utf8'");
	$conn->query("SET CHARACTER SET utf8");
}

function executeQuery($query) {
	global $conn;
	
	if(!$conn)
		conndb();

	$result = mysqli_query($conn, $query);
	
	closedb();
		
	if(!$result)
		$message = "Error," . mysqli_error($conn);
	else
		return $result;
}

function closedb() {
    global $conn;
	
    if(!$conn)
		mysqli_close($conn);
}





?>
