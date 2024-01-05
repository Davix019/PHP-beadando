<?php
session_start();

$score = $_POST['szam'];

$mysqli = require __DIR__ . "/connect.php";

$sql = sprintf("SELECT * FROM users WHERE id = '%s'", $mysqli->real_escape_string($_SESSION["user_id"]));

$result = $mysqli->query($sql);

$user = $result->fetch_assoc();

var_dump($user);
var_dump($score);
?>