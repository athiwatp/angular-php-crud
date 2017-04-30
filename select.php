<?php

include 'connect.php';

$statement = $conn->prepare('SELECT * FROM users');
$statement->execute(array());

while($row = $statement->fetch()) {
	$data[] = $row;
}

print json_encode($data);
