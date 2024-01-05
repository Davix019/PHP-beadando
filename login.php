<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $mysqli = require __DIR__ . "/connect.php";

    $sql = sprintf("SELECT * FROM users WHERE userName = '%s'", $mysqli->real_escape_string($_POST["userName"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user)
    {
        if (password_verify($_POST["password"], $user["password"]))
        {
            session_start();

            session_regenerate_id();

            $_SESSION["user_id" ] = $user["id"];

            header("Location: index.php");
            exit;
        }
    }
    else
    {
        $is_invalid = true;
    }
    /*var_dump($user);
    exit;*/
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <form method="post">
        <div id="reg">Login</div>

        <p>
            <?php if ($is_invalid): ?>
                <em>This username doesn't exists</em>
            <?php endif; ?>
        </p>
        
        Felhasználónév:
        <div>
            <input type="text" id="userName" name="userName" value="<?= htmlspecialchars($_POST["userName"] ?? "") ?>"/>
        </div>

        Jelszó:
        <div>
            <input type="password" id="password" name="password" />
        </div>

        <div>
            <input type="submit" value="Belépés" id="submit"/>
        </div>

    </form>

</body>
</html>