<?php
include_once "AB.php";
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kártya</title>
    <link rel="stylesheet" href="stilus.css">
</head>

<body>
    <main>
    <?php
    $adatbazis = new AB();
    //feltöltés
    //echo "Méret:".$adatbazis->meret("forma");
    if ($adatbazis->meret("kartya") == 0) {
        $adatbazis->feltoltes("kartya", "szinAzon", "formaAzon", "szin", "forma");
    }
    $matrix = $adatbazis->oszlopLeker("nev", "kep", "szin");
    $adatbazis->megjelenitTeljes($matrix, "nev", "kep");
    $adatbazis->modosit("szin", "nev", "piros", "vörös");
    $adatbazis->kartyaLeker();
    $adatbazis->alsoTorles();
    $adatbazis ->alsoVisszaTolt();




    $adatbazis->kapcsolatBezar();
    ?>
</body>
    </main>
    

</html>