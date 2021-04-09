<?php
    // start the session
    session_start();

    // $title contains the title for the page
    $title = "Home";
    
    // this inserts the header and the navbar
    require_once('header.php');  
?>

<body>
    <div class="header">
        <img src="./images/hotel2.jpg" class="img-fluid" alt="Responsive image" style="width:100%;height:400px;">
    </div>

    <div class="products mt-2">
        <h4 class="text-center">Hotel ter Duin</h4>
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