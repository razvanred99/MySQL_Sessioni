<?php
/**
 * Created by PhpStorm.
 * User: razva
 * Date: 23/06/2018
 * Time: 09:16
 */

include('database_scripts.php');

$dataConnection = new mysqli("localhost", "root", "");

if ($dataConnection->connect_error)
    die("Impossibile connettersi");

if ($dataConnection->multi_query("CREATE DATABASE IF NOT EXISTS DatiUtenti;" .
    "USE DatiUtenti;" .
    "CREATE TABLE if not exists Dati(
  Username VARCHAR(32) NOT NULL PRIMARY KEY ,
  Nome VARCHAR(32) NOT NULL,
  Cognome VARCHAR(32) NOT NULL
)engine=innodb;")) {

    print_r("DatiUtenti creato con successo<br>");

    $credenzialiConnection = new mysqli("localhost", "root", "");

    if ($credenzialiConnection->connect_error)
        die("Impossibile connettersi");

    if ($credenzialiConnection->multi_query("CREATE DATABASE IF NOT EXISTS Credenziali;
                                            USE Credenziali;
                                            CREATE TABLE IF NOT EXISTS Utenti(
                                            Username VARCHAR(32) PRIMARY KEY,
                                            Password VARCHAR(128) NOT NULL)engine=innodb;")) {
        exit("Credenziali creato con successo");
    } else die("Impossibile creare il database delle credenziali");

} else die("Impossibile creare il database dei dati");