<!doctype html>

<html>

<head>
    <title>Registrazione</title>
</head>

<body>

<?php
/**
 * Created by PhpStorm.
 * User: razva
 * Date: 22/06/2018
 * Time: 21:33
 */

if (isset($_POST) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST["nome"]) && isset($_POST['cognome'])) {

    include('database_scripts.php');

    $dataConnection = connessioneDatabase("DatiUtenti");
    $credenzialiConnection = connessioneDatabase("Credenziali");

    if ($credenzialiConnection->query("INSERT INTO utenti values ('" . $_POST['username'] . "','" . hash('sha256',$_POST['password']) . "')")) {

        if ($dataConnection->query("INSERT INTO dati VALUES ('" . $_POST['username'] . "','" . $_POST['nome'] . "','" . $_POST['cognome'] . "')")) {
            echo "Registrazione completata <br> <button onclick=\"location.href='login.php'\" type='button'>Torna al login</button>";
        } else die("Impossibile inserire i dati");

    } else die ("Impossibile insrire le credenziali");

} else { ?>

    <form action="registration.php" method="post">

        <table>
            <tr>
                <td>
                    <label for="inpName">Nome</label>
                </td>
                <td>
                    <input type="text" id="inpName" name="nome" required/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="inpSurname">Cognome</label>
                </td>
                <td>
                    <input type="text" id="inpSurname" name="cognome" required/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="inpUsername">Username</label>
                </td>
                <td>
                    <input type="text" id="inpUsername" name="username" required/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="inpPassword">Password</label>
                </td>
                <td>
                    <input type="password" id="inpPassword" name="password" required/>
                </td>
            </tr>
        </table>

        <br/>

        <input type="submit" value="REGISTRA"/>

    </form>

<?php } ?>

</body>

</html>

