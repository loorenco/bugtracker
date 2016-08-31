<?php
global $mysql;

$conn = mysqli_connect($mysql['host'], $mysql['user'], $mysql['password'], $mysql['db']);

function query($query){
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
		return mysqli_affected_rows($conn);
	} else {
		return false;
	}
}
?>
