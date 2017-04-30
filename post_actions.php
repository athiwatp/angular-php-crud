<?php

include 'connect.php';

$data = json_decode(file_get_contents("php://input"));

$buttonName = $data->buttonName;

if($buttonName == "Add")
{
	$statement = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
	$statement->execute(array(
		'name' => $data->name,
		'email' => $data->email
	));
}
elseif($buttonName == "Update")
{
	$statement = $conn->prepare("UPDATE users SET name=:name, email=:email WHERE id=:id");
	$statement->execute(array(
		'name' => $data->name,
		'email' => $data->email,
		'id' => $data->id
	));
}