<?php

class DomovKontroler extends Kontroler
{
    function zpracuj($parametry)
    {

        $this->hlavicka["titulek"] ="Z domova";
        $this->pohled="domov";

        
    }
}
?>