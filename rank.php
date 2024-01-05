<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranklist</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: yellow
        }

        body {
            background-image: url(amaterasu.jpg);
            color: red;
        }
        
        table {
            background-color: black;
        }

        a {
            text-decoration: none;
            font-size: 24px;
            color: yellow
        }
    </style>

</head>
<body>
<h1> Ranklist </h1>

<?php
$conn = require __DIR__ . "/connect.php";

$sql = "SELECT id, pc FROM rank";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Id</th><th>Score</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["pc"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "Empty";
}

$conn->close();
?>
<br>
<a href="index.php">Back to Main page</a>
</body>
</html>