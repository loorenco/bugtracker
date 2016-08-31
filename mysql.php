<?php
global $mysql;

$conn = mysqli_connect($mysql['host'], $mysql['user'], $mysql['password'], $mysql['db']);
function GET($string){
	global $conn;
	return mysqli_real_escape_string($conn, $_GET[$string]);
}
function POST($string){
	global $conn;
	return mysqli_real_escape_string($conn, $_POST[$string]);
}
function query($query, $show_errors = false){
	global $conn;
	$result = mysqli_query($conn, $query);
	$return = array();
	if ((0 === strpos($query, 'SELECT')) && mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		mysqli_free_result($result);
		return $return;
	} elseif((false === strpos($query, 'SELECT')) && mysqli_affected_rows($conn) > 0){
		return mysqli_affected_rows($conn);
	} elseif(!$show_errors) {
		return false;
	} elseif (mysqli_connect_errno()) {
		return "Failed to connect to MySQL: " . mysqli_connect_error();
	} else {
		return "Error description: " . mysqli_error($conn);
	}
}
?>