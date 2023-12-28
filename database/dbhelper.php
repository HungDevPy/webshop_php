<?php
require_once('config.php');

function execute($sql)
{
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	mysqli_query($con, $sql);	

	//close connection
	mysqli_close($con);
}

function executeResult($sql)
{
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$data   = [];
	while ($row = mysqli_fetch_array($result, 1)) {
		$data[] = $row;
	}
	mysqli_close($con);
	return $data;
}

function executeSingleResult($sql)
{
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$row    = mysqli_fetch_array($result, 1);

	//close connection
	mysqli_close($con);

	return $row;
}
// Hàm thực hiện truy vấn SQL để lấy dữ liệu sản phẩm cho mỗi trang
function getProductsForPage($currentPage, $limit)
{
	$start = ($currentPage - 1) * $limit;
	$sql = "SELECT * FROM product LIMIT $start, $limit";
	return executeResult($sql);
}

function executeInsert($sql)
{
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	
	if (mysqli_query($con, $sql)) {
        // If the query is successful, get the ID of the last inserted row
        $insertedId = mysqli_insert_id($con);
    } else {
        // If the query fails, print the error details
        echo "Error: " . mysqli_error($con);
        $insertedId = 0; // Set to 0 to indicate failure
    }

	// close connection
	mysqli_close($con);

	return $insertedId;
}