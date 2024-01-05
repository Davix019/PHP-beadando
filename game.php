<!DOCTYPE html>
<html>
<head>
    <title>Perfect Idle Game</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        p {
            font-size: 20px;
        }
    </style>
</head>
<body>

<?php session_start(); ?>
<?php if (isset($_SESSION["user_id"])): 
    $mysqli = require __DIR__ . "/connect.php";

    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    ?>
    
    <form action="save.php" method="POST">
        <p>Hello <?= htmlspecialchars($user["userName"]) ?></p>
        <div>
            <button>Save to ranklist and exit</button>
        </div>
    <?php else: 
    header("Location: index.php");
    endif; ?>


    <p id="szam" name="szam">0</p>
    <input type="hidden" name="szam" value="0" id="szamInput">
    </form>
    <p id="novekedes">0</p>
    <p id="novekedes2"> /seconds</p>
    <div id="pizza">
        <img src="sharingan.jpg" onclick="Kattint()" id="rotatingImage"/>
    </div>

    <table>
        <tr>
            <td>
                <button onclick="Cursor()">Cursor</button>
                <p>Cost:</p>
                <div id="cursorcost">15</div>
                <p>Owned:</p>
                <div id="cursorowned">0</div>
            <td>
                <button onclick="Grandma()">Grandma</button>
                <p>Cost:</p>
                <div id="grandmacost">100</div>
                <p>Owned:</p>   
                <div id="grandmaowned">0</div>
            </td>
            <td>
                <button onclick="Farm()">Farm</button>
                <p>Cost:</p>
                <div id="farmcost">1100</div>
                <p>Owned:</p>   
                <div id="farmowned">0</div>
            </td>
            <td>
                <button onclick="Mine()">Mine</button>
                <p>Cost:</p>
                <div id="minecost">12000</div>
                <p>Owned:</p>   
                <div id="mineowned">0</div>
            </td>
        </tr>

    </table>
    <audio id="myAudio">
        <source src="upgrade.mp3" type="audio/mp3">
        Your browser does not support the audio element.
      </audio>

    <script src="script.js"> </script>
      <br>
    <a href="index.php">Back to Main page</a>
</body>
</html>
