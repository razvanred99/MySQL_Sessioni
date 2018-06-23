<?php
session_start();
?>

<!doctype html>

<html lang="en">

<head>
    <title>HomePage</title>
    <meta charset="utf-8"/>
</head>

<body>

<?php

if (isset($_SESSION['user'])) {
    echo "Ciao " . $_SESSION['user'] . " <a href=\"logout.php\">Logout</a>";

    ?>

    <table>
        <?php

        include('database_scripts.php');

        $dataConnection = connessioneDatabase("DatiUtenti");

        if ($result = $dataConnection->query("SELECT * FROM dati WHERE Username='" . $_SESSION['user'] . "'")) {

            if ($result->num_rows > 0) {

                while ($array = $result->fetch_array(MYSQLI_ASSOC)) {

                    foreach ($array as $key => $data) {
                        echo "<tr>";
                        echo "<td>$key</td>";
                        echo "<td>$data</td>";
                        echo "</tr>";
                    }
                }

            } else die("Utente non valido");

        } else die ("Errore query");
        ?>
    </table>

    <?php

} else header("Location: login.php");
?>

</body>

</html>
