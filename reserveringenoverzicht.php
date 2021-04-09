<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>reserveringen</title>
    </head>
    <body>

        <?php 
        // this inserts the header and the navbar
        require_once('header.php'); 
        //this includes the database
        include 'database.php';
        $db = new database();
        //this selects everything from person in the database
        $persoon = $db->select("SELECT * FROM persoon", []);

        $columns = array_keys($persoon[0]);
        $row_data = array_values($persoon)
        
        

        ?>

        <a href="medewerkers.php" class="btn btn-dark">terug</a>
        <table>
        <table class="table table-striped table-dark">
            <tr>
                <?php
                    foreach($columns as $column){
                        echo "<td><strong>$column</strong></td>";
                    }
                ?>
                <th colspan="2">action</th>
            </tr>
            <?php  
                foreach($row_data as $rows){
                    echo "<tr>";
                    foreach($rows as $data){
                        echo "<td>$data</td>";
                    }
                    ?>
                    <td>
                    <a href="edit_reservering.php?persoon_persoonid=<?php echo $rows['persoonid']?>" class="btn btn-primary">edit</a>
                    <a href="delete_reservering.php?persoon_persoonid=<?php echo $rows['persoonid']?>" class="btn btn-danger">delete</a>
                    </td>
                    </tr>
                    
              <?php  }?>
            
        </table>
        <body>
    <br>       
    </body>
</html>