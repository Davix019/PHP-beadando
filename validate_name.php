<?php

    $mysqli = require __DIR__ . "/connect.php";

    $sql = sprintf("SELECT * FROM users
                    WHERE userName = '%s'",
                    $mysqli->real_escape_string($_GET["userName"]));

    $result = $mysqli->query($sql);

    $is_available = $result->num_rows === 0;

    header("Content-Type: application/json");

    echo json_encode(["available" => $is_available]);
?>