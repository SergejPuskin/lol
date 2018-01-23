<?php

class AdminKontroler extends Kontroler
{
    function zpracuj($parametry)
    {

        $this->hlavicka["titulek"] ="Administace";
        $this->pohled="admin";
        if(isset($_POST['poslat'])) {
            $kategorie = $_POST['kategorie'];
            $nadpis = $_POST['nadpis'];
            $text1 = $_POST['text1'];
            $datum = $_POST['datum'];
            $text2 = $_POST['text2'];

            $obrazek1Nazev = rand(0,100000)."_".$_FILES['obrazek1']['name'];
            $obrazek2Nazev = rand(0,100000)."_".$_FILES['obrazek2']['name'];

            /*Obrazek 1*/
            $oldpath = $_FILES['obrazek1']['tmp_name'];
            $newpath ="img/".$obrazek1Nazev;
            move_uploaded_file($oldpath, $newpath);

            /*Obrázek 2*/
            $oldpath = $_FILES['obrazek2']['tmp_name'];
            $newpath ="img/".$obrazek2Nazev;
            move_uploaded_file($oldpath, $newpath);


            Db::query("INSERT INTO zpravy(nadpis,kategorie,text1,datum,text2, obrazek1, obrazek2) VALUES(?,?,?,?,?,?,?)", $nadpis, $kategorie, $text1,  $datum, $text2,$obrazek1Nazev, $obrazek2Nazev);
        }


        }
}