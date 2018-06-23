<?php
/**
 * Created by PhpStorm.
 * User: razva
 * Date: 23/06/2018
 * Time: 08:57
 */

function connessioneDatabase(string $dbName): mysqli
{
    $connessione = new mysqli("localhost", "root", "", $dbName);

    if ($connessione->connect_error)
        die("Impossibile connettersi a $dbName: " . $connessione->connect_error);
    return $connessione;
}