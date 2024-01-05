<?php
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    //Validation

    if (empty($userName))
    {
        die("Name is required");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        die("The email must be valid");
    }

    if (strlen($password) < 8)
    {
        die("Your password must be at least 8 characters");
    }

    if (!preg_match("/[a-z]/i", $password))
    {
        die("Your password must contain at least one letter");
    }

    if ($password !== $password_confirm)
    {
        die("Passwords must match");
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    //Database connection

    $mysqli = require __DIR__ . "/connect.php";
    
    $sql = "INSERT INTO users (username, email, password)
        VALUES(?, ?, ?)";
    
    $stmt = $mysqli->stmt_init();

    if (! $stmt->prepare($sql))
    {
        die("SQL Error: " . $mysqli->error);
    }

    $stmt->bind_param("sss", $userName, $email, $password_hash);

    if ($stmt->execute())
    {
        header("Location: reg_succes.html");
    }
    else
    {
        if ($mysqli->errno === 1062)
        {
            die("Username already taken");
        }
        else
        {
            die($mysqli->error . " " . $mysqli->errno);
        }
    }

    /*$conn = new mysqli('localhost', 'root', '', 'Database');
    if ($conn->connect_error)
    {
        die('Connection Failed : '.$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("insert into users(userName, email, password)
            values(?, ?, ?)");
        $stmt->bind_param("sss", $userName, $email, $password_hash);
        if ($stmt->execute())
        {
            echo "Registation succesfully...";
        }
        else
        {
            if ($conn->errno === 1062)
            {
                die("Email already taken");
            }
            else
            {
                die($conn->error . " " . $conn->errno);
            }
        }
        $stmt->close();
        $conn->close();
    }*/
?>