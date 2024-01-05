<?php

$host = "mysql.caesar.elte.hu";
$dbname = "davix019";
$username = "davix019";
$password = "PVhaWggsgVLhNW7d";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error)
    {
        die('Connection Failed : '.$mysqli->connect_error);
    }

return $mysqli;
?>