<?php

// $title contains the title for the page
$title = "reserveren";

// include the database class
include "database.php";

// start the session
session_start();

require_once('header.php');
// this inserts the header and the navbar

    //$database = new database();
    //$database->insertklant();


    if(isset($_POST['submit'])){

        $fields = ['naam', 'adres', 'plaats', 'postcode', 'telefoon', 'van', 'tot', 'kamerid'];

        $error = false;

        foreach($fields as $field){
            if(!isset($_POST[$field]) || empty($_POST[$field])){
             $error = true;
        }
    }

    if(!$error){
        // store posted form values in variables
        $naam= $_POST['naam'];
        $adres= $_POST['adres'];
        $plaats= $_POST['plaats'];
        $postcode = $_POST['postcode'];
        $telefoon= $_POST['telefoon'];
        $van= $_POST['van'];
        $tot= $_POST['tot'];
        $kamerid= $_POST['kamerid'];
            
        $database = new database();
        // login function
        $database->reserveren($naam, $adres, $plaats, $postcode, $telefoon, $van, $tot, $kamerid);   
     }
}
  
    // this inserts the header and the navbar
    //require_once('header.php');  
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Reservering</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
    
    <body>
    <div class="container">
        <div class="row">
            <div class="col-6">        
        <img src="./images/hotel.jpg" class="img-fluid" style="width:500px;height:250px";>
    </div>
    
        <div class="col-1"></div>
        <div class= "col-4 ruimte border shadow p-3 mb -5 bg-white rounded registreer">
        <p>If you want to download the pdf file click on download pdf and fill out the form again.</p>
        <p>And if you dont want the pdf but want it in the database click on submit.</p>
            <form class="form-signin" action="" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Reservering</h1>
                
                <label for="naam">Naam</label>
                <input type="text" name="naam" class="form-control" placeholder="naam" required="" autocomplete="off">
                <br>

                <label for="adres">Adres</label>
                <input type="text" name="adres" class="form-control" placeholder="adres" autocomplete="off">
                <br>

                <label for="plaats">Plaats</label>
                <input type="text" name="plaats" class="form-control" placeholder="plaats" required="" autocomplete="off">
                <br>

                <label for="postcode">Postcode</label>
                <input type="text" name="postcode" class="form-control" placeholder="postcode" required="" autocomplete="off">
                <br>

                <label for="telefoon">Telefoon</label>
                <input type="telefoon" name="telefoon" class="form-control" placeholder="telefoon" required="" autocomplete="off">
                <br>
                <br>

                <?php
                $database = new database('localhost', 'root', '', 'drempeltoets', 'utf-8');
                ($kamerid=$database->kamerselecteren());
                    echo "<select name = 'kamerid'>";
                foreach($kamerid as $kamerid): {
                    echo "<option value = '" .$kamerid['kamerid']."'>".$kamerid['kamerid']."</option>";
                }
                endforeach;
                echo "</select>";   
                ?>

                <br>
                <label for="van">Van</label>
                <input type="date" name="van" class="form-control" placeholder="van" required="" autocomplete="off">
                <br>

                <label for="tot">Tot</label>
                <input type="date" name="tot" class="form-control" placeholder="tot" required="" autocomplete="off">
                <br>
                
                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="submit">
                <br>

                <button type="button" class="btn btn-lg btn-success btn-block"><a href="reserveren1.php">download pdf</a></button>
            </form>
            </div>
            
        </div>
    </div>
</div>
</body>
</html>