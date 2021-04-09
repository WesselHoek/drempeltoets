<?php

$title = "contactpagina";

require_once('header.php');

include "database.php";
session_start();

?>

<body>
    <div class="header">
        <img src="./images/hotel2.jpg" class="img-fluid" alt="Responsive image" style="width:100%;height:400px;">
    </div>

    <div class="products mt-2">
        <h4 class="text-center">Hotel ter Duin</h4>
        <p class="text-center">Telefoonnummer: 061111111</p>
        <p class="text-center">postadres: 1287JH</p>
        <p class="text-center">e-mailadres: hotelterduin@info.com</p>
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="./images/hotel.jpg" class="img-fluid" alt="Responsive image" style="width:1000px;height:250px;">
                </div>
                <div class="col">
                    <img src="./images/hotel1.jpg" class="img-fluid" alt="Responsive image" style="width:500px;height:250px;">
                </div>
            </div>
        </div>
    </div>
</body>