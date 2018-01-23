<?php

class HomepageKontroler extends Kontroler
{
    function zpracuj($parametry)
    {

        $this->hlavicka["titulek"] ="Úvodní stránka";
        $this->pohled="homepage";

    }
}