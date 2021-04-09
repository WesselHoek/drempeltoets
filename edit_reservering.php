<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include 'database.php';
$db = new database();

if(isset($_GET['persoon_persoonid'])){
    $db = new database();
    $persoon = $db->select("SELECT * FROM persoon WHERE persoonid = :persoonid", ['persoonid'=>$_GET['persoon_persoonid']]);
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "UPDATE persoon SET naam=:naam, adres=:adres, plaats=:plaats, postcode=:postcode, telefoon=:telefoon WHERE persoonid=:persoonid";
    
    $placeholders = [
        'naam'=>$_POST['naam'],
        'adres'=>$_POST['adres'],
        'plaats'=>$_POST['plaats'],
        'postcode'=>$_POST['postcode'],
        'telefoon'=>$_POST['telefoon'],
        'persoonid'=>$_POST['persoon_persoonid']
    ];
    print_r($placeholders);

    $db->update_or_delete($sql, $placeholders);
}



?>
    <form action="edit_reservering.php" method="post">
    <input type="hidden" name="persoon_persoonid" value="<?php echo isset($_GET['persoon_persoonid']) ? $_GET['persoon_persoonid'] : '' ?>">
    <input type="text" name="naam" placeholder="naam" value="<?php echo isset($persoon[0]['naam']) ? $persoon[0]['naam'] : ''?>">
    <input type="text" name="adres" placeholder="adres" value="<?php echo isset($persoon[0]['adres']) ? $persoon[0]['adres'] : ''?>">
    <input type="text" name="plaats" placeholder="plaats" value="<?php echo isset($persoon[0]['plaats']) ? $persoon[0]['plaats'] : ''?>">
    <input type="text" name="postcode" placeholder="postcode" value="<?php echo isset($persoon[0]['postcode']) ? $persoon[0]['postcode'] : ''?>">
    <input type="text" name="telefoon" placeholder="telefoon" value="<?php echo isset($persoon[0]['telefoon']) ? $persoon[0]['telefoon'] : ''?>">
    <input type="submit" name="Edit">
    
    </form>

</body>
</html>