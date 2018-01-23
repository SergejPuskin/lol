<?php

class ZahraniciKontroler extends Kontroler
{
    function zpracuj($parametry)
    {

        $this->hlavicka["titulek"] ="Zahranici";
        $this->pohled="zahranici";

        
    }
}
?>