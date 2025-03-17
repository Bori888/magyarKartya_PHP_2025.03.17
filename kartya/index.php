<?php 
    include_once "AB.php";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kártya</title>
</head>
<body>
    <?php
        $adatbazis = new AB();
        //feltöltés
        //echo "Méret:".$adatbazis->meret("forma");
        if ($adatbazis->meret("kartya") == 0){
            $adatbazis->feltoltes("kartya", "szinAzon", "formaAzon", "szin", "forma");
        } 
        $matrix = $adatbazis->oszlopLeker("nev","kep", "szin");
        $adatbazis->megjelenitTeljes($matrix,"nev","kep");
        $adatbazis->kapcsolatBezar();
    ?>
</body>
</html>