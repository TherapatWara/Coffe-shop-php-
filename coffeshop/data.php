<?php include "connect.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
 
    try{
    $sql = "SELECT * FROM chartjs.barchart";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0) {
        while($row = $result->fetch()) {
        }

    unset($result);
    } else {
        echo "No records matching your query were found.";
    }
    } catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
    
   
    unset($pdo);
    ?>
</body>
</html>