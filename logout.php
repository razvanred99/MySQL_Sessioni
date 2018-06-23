<?php
/**
 * Created by PhpStorm.
 * User: razva
 * Date: 22/06/2018
 * Time: 22:07
 */

session_start();
session_destroy();
header("Location: login.php");
exit();