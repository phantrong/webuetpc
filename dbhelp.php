<?php
require_once ('config.php');

/**
 * insert, update, delete -> su dung function
 */
function execute($sql) {
	//create connection toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	// $sql = $conn->real_escape_string($sql);

	//query
	mysqli_query($conn, $sql);

	//dong connection
	mysqli_close($conn);
}

function executeConn($sql) {
	//create connection toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	// $sql = $conn->real_escape_string($sql);
	//query
	mysqli_query($conn, $sql);
	return $conn;
	//dong connection
	mysqli_close($conn);
}
/**
 * su dung cho lenh select => tra ve ket qua
 */
function executeResult($sql) {
	//create connection toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	// $sql = $conn->real_escape_string($sql);
	//query
	$resultset = mysqli_query($conn, $sql);
	$list      = [];
	while ($row = mysqli_fetch_array($resultset, 1)) {
		$list[] = $row;
	}

	//dong connection
	mysqli_close($conn);

	return $list;
}

function executeSingleResult($sql) {
	//create connection toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	// $sql = $conn->real_escape_string($sql);

	//query
	$resultset = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($resultset, 1);
	
	//dong connection
	mysqli_close($conn);

	return $row;
}
function getCurrentPageURL() {
	// $pageURL = 'http';
	// if (!empty($_SERVER['HTTPS'])) {
	// if ($_SERVER['HTTPS'] == 'on') {
	// $pageURL .= "s";
	// }
	// }
	// $pageURL .= "://";
	$pageURL = '';
	if ($_SERVER["SERVER_PORT"] != "80") {
	$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	} else {
	$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}