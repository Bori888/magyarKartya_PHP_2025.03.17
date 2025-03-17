<?php
class AB
{
    //adattagok

    private $host = "localhost";
    private $felhasznaloNev = "root";
    private $jelszo = "";
    private $adatbazisNev = "magyarkartya";
    private $kapcsolat;

    //konstruktor
    public function __construct()
    {
        $this->kapcsolat = new mysqli($this->host, $this->felhasznaloNev, $this->jelszo, $this->adatbazisNev);

        if ($this->kapcsolat->connect_error) {
            echo "Hiba: " . $this->kapcsolat->connect_error;
        } else {
            echo "Sikeres kapcsolódás";
        }
    }

    //tagfüggvények
    public function kapcsolatBezar()
    {
        $this->kapcsolat->close();
    }

    public function meret($tabla)
    {
        $sql = "SELECT * FROM $tabla";
        $matrix = $this->kapcsolat->query($sql);
        return $matrix->num_rows;
    }

    public function feltoltes($ujTabla, $mezo1, $mezo2, $tabla1, $tabla2)
    {
        $mezo1Meret = $this->meret($tabla1);
        $mezo2Meret = $this->meret($tabla2);

        for ($i = 1; $i <= $mezo1Meret; $i++) {
            for ($j = 1; $j <= $mezo2Meret; $j++) {
                $sql = "INSERT INTO $ujTabla($mezo1, $mezo2) VALUES ('$i','$j')";
                $siker = $this->kapcsolat->query($sql);
                echo $siker ? "siker" : "sikertelen";
            }
        }
    }

    //oszlop lekérdezése
    public function oszlopLeker($oszlop, $oszlop2, $tabla)
    {
        $sql = "SELECT $oszlop, $oszlop2 FROM $tabla";
        $matrix = $this->kapcsolat->query($sql);
        return $matrix;
    }


    public function megjelenitTeljes($matrix)
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>Név</th>";
        echo "<th>Kép</th>";
        echo "</tr>";
        while ($sor = $matrix->fetch_row()) { //assoc
            echo "<tr>";
            echo "<td>$sor[0]</td>";
            echo "<td><img src='forras/$sor[1]' alt='szin kep'></td>";
            echo "</tr>";

            # code...
        }
    }
    public function modosit($tabla, $oszlop, $regiErtek, $ujErtek)
    {
        $sql = "UPDATE $tabla SET $oszlop='$ujErtek' WHERE $oszlop= '$regiErtek'";
        $this->kapcsolat->query($sql);
    }
    public function kartyaLeker()
    {
        $sql = "SELECT sz.nev,f.szoveg
        FROM kartya as k 
        INNER JOIN forma as f on k.formaAzon= f.formaAzon,
        INNER JOIN szinas sz on sz.szinAzon =k.szinAzon";
                }

    public function alsoTorles(){
        $sql="SELECT * FROM kartya WHERE kartya.formaAzon = 2";
    }
    public function alsoVisszaTolt(){
        for ($i=1; $i < 5; $i++) { 
            $sql= "INSERT INTO kartya ('formaAzon', 'szinAzon') VALUES ('2','$i')";
            
        }
        
    }
}
