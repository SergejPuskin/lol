<?php
class ErrorKontroler extends Kontroler{

    public function zpracuj($parametry){
        //hlavička požadavku
        header("HTTP/1.0 404 Not Found");
        //hlavička stránky
        $this->hlavicka['titulek'] ="Chyba 404";
        //nastavení šablony
        $this->pohled = 'chyba';
    }

}