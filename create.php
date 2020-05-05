<?php

$app = require "./core/app.php";

// Create new instance of user
$users = new User($app->db);
// Insert it to database with POST data
$users->insert(array(
	'name' => $_POST['name'],
	'email' => $_POST['email'],
	'city' => $_POST['city'],
	'number' => $_POST['number']
));

// Redirect back to index
header('Location: index.php');
