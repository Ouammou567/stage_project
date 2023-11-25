<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mon Compte | Stage </title>
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
        }
    </style>
</head>
<body>
    <div id="siteWeb">
        <header>
            <?php echo "<i>Nom</i>:  " . "<span>". $_SESSION['nom']. "</span>" ."<br/>"?>
            <?php echo "<i>Mot de Passe: </i>  " . "<span>" . $_SESSION['mot_de_passe'] ."</span>" . "<br/><hr/>"?>
        </header>
    </div>
</body>
</html>