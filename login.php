<?php
session_start();
?>

<!doctype html>

<html lang="it">

<head>
    <title>Login</title>
    <meta charset="utf-8"/>
</head>

<body>

<?php

if (isset($_SESSION) && isset($_SESSION['user'])) {
    header("Location: index.php");
} else if (!empty($_POST) && isset($_POST['username']) && isset($_POST['password'])) {


    $credenzialiDb = new mysqli("localhost", "root", "", "Credenziali");

    if ($credenzialiDb->connect_error)
        die("Impossibile connettersi: " . $credenzialiDb->connect_error);

    if ($result = $credenzialiDb->query("SELECT Password FROM utenti WHERE Username='" . $_POST['username'] . "'")) {
        if ($result->num_rows > 0) {

            $obj = $result->fetch_object();

            if ($obj->Password === strtolower(hash('sha256', $_POST['password']))) {
                //login effettuato con successo
                $_SESSION['user'] = $_POST['username'];
                header("Location: index.php");
            } else die ("Password non valida");

        } else die("Username inesistente");

    } else die("Errore nella query");

} else { ?>

    <form method="post" action="login.php">
        <h1>Login</h1>

        <table>
            <tr>
                <td>
                    <label for="inpUsername">Username</label>
                </td>
                <td>
                    <input type="text" name="username" id="inpUsername"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="inpPassword">Password</label>
                </td>
                <td>
                    <input type="password" name="password" id="inpPassword" required/>
                </td>
            </tr>
            <tr>
                <td>
                    <button onclick="location.href='registration.php'" id="btnRegistration" type="button">New User</button>
                </td>
                <td>
                    <input type="submit" value="ENTRA!"/>
                </td>
            </tr>
        </table>

    </form>

<?php } ?>
</body>

</html>
