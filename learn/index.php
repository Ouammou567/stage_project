<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> learn </title>
</head>
<body>
    <?php 
        $db_connection = new PDO ('mysql:host=localhost; dbname=bd_stage', 'root', '');
        if(!$db_connection) {
            echo "Not Connected";
        }

        $stmt = $db_connection -> prepare("SELECT * FROM `utilisateurs`");
        $stmt -> execute();

        while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
            foreach ($res as $key => $value) {
                echo "$key: $value<br/>";
            }
            echo "<hr/>";
        }
        
        

        
        $stmt = null ;
        $db_connection = null ; 

    ?>
</body>
</html>