<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JohnRussel.com</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">



</head>

<body>

    <div class="contin">
        <div class="navbar">
            <a href="creator.html"><img src="img\logo.png" alt="Profile" class="logo" href="creator.html"></a>
            <nav>
                <ul>
                    <a href="about.html">About</a>
                    <a href="characters.html">Characters</a>
                    <a href="buy.html">Buy</a>
                    <a href="loginpage.php">Log-out</a>
                    
                </ul>
            </nav>
        </div>
    </div>
    <section id="home"></section>

    <?php if (isset($user)) : ?>
        <h1 id="tlemsg">WELCOME <?= htmlspecialchars($user["name"]) ?> TO</h1>
    <?php endif; ?>
    <img alt="UNDERTALE" id="titlescreen" src="img\mainlogo.png">


    <script src="script.js"></script>
</body>

</html>