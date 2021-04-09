<?php

require_once __DIR__ . '/vendor/autoload.php';

//grab variables
$naam= $_POST['naam'];
$adres= $_POST['adres'];
$plaats= $_POST['plaats'];
$postcode = $_POST['postcode'];
$telefoon= $_POST['telefoon'];
$van= $_POST['van'];
$tot= $_POST['tot'];
$kamerid= $_POST['kamerid'];


//create new pdf instance
$mpdf = new \Mpdf\Mpdf();

//create our pdf
$data = '';
$data .='<h1>jou gegevens</h1>';

$data .='<strong>Naam</strong>' . $naam . '<br>';
$data .='<strong>adres</strong>' . $adres . '<br>';
$data .='<strong>plaats</strong>' . $plaats . '<br>';
$data .='<strong>postcode</strong>' . $postcode . '<br>';
$data .='<strong>telefoon</strong>' . $telefoon . '<br>';
$data .='<strong>van</strong>' . $van . '<br>';
$data .='<strong>tot</strong>' . $tot . '<br>';
$data .='<strong>kamerid</strong>' . $kamerid . '<br>';

//write pdf
$mpdf->WriteHTML($data);

//output to browser
$mpdf->output('myfile.pdf', 'D');