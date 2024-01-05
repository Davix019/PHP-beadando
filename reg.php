<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reg.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validation.js" defer></script>

</head>
<body>

    <form action="signup.php" method="post" id="signup" novalidate>
        <div id="reg">Registration</div>
        Username:
        <div>
            <input type="text" id="userName" name="userName" />
        </div>

        E-mail:
        <div>
            <input type="email" id="email" name="email"/>
        </div>

        Password:
        <div>
            <input type="password" id="password" name="password" />
        </div>

        Repeat password:
        <div>
            <input type="password" id="password_confirm" name="password_confirm" />
        </div>

        <!--<input type="submit" id="submit" name="submit" value="Sign up" />-->
        <div>
            <button>Sign up</button>
        </div>

    </form>
    

</body>
</html>