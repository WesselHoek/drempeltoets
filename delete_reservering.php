<?php


if(isset($_GET['persoon_persoonid'])){
include 'database.php';
$db = new database();

$sql = "DELETE FROM persoon WHERE persoonid=:persoonid";
    
    $placeholders = [
        'persoonid'=>$_GET['persoon_persoonid']
    ];

    $db->update_or_delete($sql, $placeholders);
}

?>