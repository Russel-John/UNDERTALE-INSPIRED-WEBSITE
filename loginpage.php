<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf(
        "SELECT * FROM user
                    WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password"], $user["password_hash"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: index.php");
            exit;
        }
    }

    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css  -->
    <link rel="stylesheet" href="loginstyle.css">


    <!-- JavaScript  -->
    <script src="loginscript.js"></script>

    <!-- Fonts  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

    <title>Login with us</title>
</head>

<body>
    <div class=" flex-r container">
        <div class="flex-r login-wrapper">
            <div class="login-text">
                <div class="logo">
                    <span><img src="img\loginlogo.gif" width="65px" height="80px"></i></span>
                    <span></span>
                </div>
                <h1>Log In</h1>
                <p>It's not long before you embark on this journey! </p>

                <div id="alerLet">
                    <?php if ($is_invalid) : ?>
                        <em>Invalid login</em>
                    <?php endif; ?>
                </div>




                <form class="flex-c" method="post">
                    <div class="input-box">
                        <span class="label">E-mail</span>
                        <div class=" flex-r input">
                            <input type="text" placeholder="E-mail" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                            <i class="fas fa-at"></i>
                        </div>
                    </div>

                    <div class="input-box">
                        <span class="label">Password</span>
                        <div class="flex-r input">
                            <input type="password" placeholder="Password" id="password" name="password">
                            <i class="fas fa-lock" onclick="togglePasswordVisibility()" id="toggleIcon"></i>
                        </div>

                        <button class="btn">Login</button>

                        <span class="extra-line">
                            <span>Don't Have an Account?</span>
                            <a href="sign-up.html">Sign Up</a>
                        </span>

                    </div>
                </form>




            </div>
        </div>
    </div>
</body>

</html>