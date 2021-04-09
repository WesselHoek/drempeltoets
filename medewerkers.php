<?php

$title = "medewerkers";

require_once('header.php');

include "database.php";
session_start();

$db = new database();
echo $_SESSION["uname"];

?>

<body>
<br>
    <a href="reserveringenoverzicht.php" class="btn btn-info">Overzicht reserveringen</a>
    </body>