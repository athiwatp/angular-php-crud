<?php

include 'connect.php';

$data = json_decode(file_get_contents("php://input"));

$statement = $conn->prepare("DELETE FROM users WHERE id=:id");
$statement->execute(array(
	'id' => $data->id
));