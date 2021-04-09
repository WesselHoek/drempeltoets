<?php

class database{
    private $servername;
    private $database;
    private $username;
    private $password;
    private $conn;

//Deze functie wordt slechts een keer aangeroepen als de database class instance bijvoorbeeld wordt aangemaakt.
function __construct() {
    $this->servername ='localhost';
    $this->database ='drempeltoets';
    $this->username ='root';
    $this->password ='';

    try{
        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password,);

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo"connected successfully";
    }   catch(PDOException $e) {
        echo "connection failed" . $e->getMessage();
    }         
}

    //Deze functie wordt gebruikt om de klanten te kunnen reserveren door de volgende informatie in te vullen
    public function reserveren($naam, $adres, $plaats, $postcode, $telefoon, $van, $tot, $kamerid){

        try{ 
            //deze sql query insert de dingen die we nodig hebben bij persoon
        $query1 = "INSERT INTO persoon (naam, adres, plaats, postcode, telefoon) VALUES (:naam, :adres, :plaats, :postcode, :telefoon)";
        $statement1= $this->conn->prepare($query1);
        $statement1->execute(
            array(
            'naam'=> $naam,
            'adres'=> $adres,
            'plaats'=> $plaats,
            'postcode'=> $postcode,
            'telefoon'=> $telefoon           
            )
        );
        $last_id = $this->conn->lastInsertId();
        //deze query insert de informatie bij reserveringsoverzicht
        $query3 = "INSERT INTO reserveringsoverzicht (van, tot, persoon_persoonid, kamer_kamerid) VALUES (:van, :tot, :persoon_persoonid, :kamer_kamerid)";
        $statement3 = $this->conn->prepare($query3);
        $statement3->execute(
            array(
            'van' => $van,
            'tot' => $tot,
            'persoon_persoonid' => $last_id,
            'kamer_kamerid' => $kamerid
            )
        );
        // redirect to home page
        header("location:index.php");

        }catch(PDOException $error){
            echo $error->getMessage();
        exit("An error occured");
        }
    } 
    public function kamerselecteren(){
        //get all kamers from kamer
        $this->stmt = $this->conn->prepare("SELECT kamerid, kamernummer from kamer");
        $result = $this->stmt->execute();

        if(!$result){
            die('<pre>Oops, Error execute query ' . $result . '</pre><br><pre>' . 'Result code: ' . $result . '</pre>');
        }
        $this->resultSet = $this->stmt->fetchALL(PDO::FETCH_ASSOC);

        $result = $this->resultSet;

        // return $result so we can use the data
        return $result;

    }


//Deze functie zorgt voor het inloggen van de medewerker
    public function loginmedewerker($uname, $psw){

        $sql = "SELECT medewerkerscode, gebruikersnaam, wachtwoord FROM medewerkers WHERE gebruikersnaam = :gebruikersnaam";
    
        //prepare
        $stmt = $this->conn->prepare($sql);
    
        $stmt->execute([
            'gebruikersnaam' => $uname
        ]);
    
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($result);
    
        if(is_array($result)){
    
            if(count($result) > 0){
    
                if ($uname == $result['gebruikersnaam'] && password_verify($psw, $result['wachtwoord'])) {
    
                    session_start();
                    $_SESSION['medewerkerscode'] = $result['id'];
                    $_SESSION['uname'] = $result['gebruikersnaam'];
    
                    header('location: medewerkers.php');
    
                }
            }else{
                echo 'Failed to login.';
            }
    
        }else{
            echo 'Failed to login. please check youre input and try again.';
        }
    
    }
    //bij deze functie kan je een medewerker inserten om te testen met die medewerker
    function insertadmin(){
        $sql="INSERT INTO medewerkers (medewerkerscode, voorletters, voorvoegsel, achternaam, gebruikersnaam, wachtwoord) VALUES (:medewerkerscode, :voorletters, :voorvoegsel, :achternaam, :gebruikersnaam, :wachtwoord);";
        
        $stmt=$this->conn->prepare($sql);
        
        $stmt->execute([
            'medewerkerscode'=>Null,
            'voorletters'=>'w',
            'voorvoegsel'=>Null,
            'achternaam'=>'Hoek',
            'gebruikersnaam'=>'Wessel',
            'wachtwoord'=>password_hash('test', PASSWORD_DEFAULT)
        ]);
    }
    
    public function select($statement, $named_placeholder){

        //$sql = "SELECT username, password, email FROM users WHERE username = :uname ;"; // :uname is een named placeholder

        // prepared statement (send statement to server  + checks syntax)
        $stmt = $this->conn->prepare($statement);

        $stmt->execute($named_placeholder);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }
    public function update_or_delete($statement, $named_placeholder){
        
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($named_placeholder);
        print_r($stmt);
        header('location: medewerkers.php');
        exit();
    }
    

}