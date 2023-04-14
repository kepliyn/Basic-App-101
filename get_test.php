<?php
require 'database.php';
$func= new functions();

$statement = $func->pdo->prepare('SELECT * FROM reservatable_thing');
$statement->execute();
$result = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>heya phucker (:</title>
</head>
<body>
    <table border="solid">
        <tr>
            <th>name</th>
            <th>discription</th>
            <th>floor</th>
            <th colspan="2">metal mesh</th>
        </tr>
        
            <?php 
            foreach($result as $row){
                ?>
                <tr>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['description']?></td>
                    <td><?php echo $row['floor']?></td>
                    <td><a href="get_test_delete.php?id= <?php echo $row['id']?>
                    &floor=<?php echo $row['floor'] ?>">DELETE</a></td>
                </tr>
                <?php

            };
            ?>
       
    </table>
</body>
</html>