<?php
mb_internal_encoding("UTF-8");
session_start();
function autoloadFunkce($trida)
{
    //končí název třídy řetězcem "Kontroler" ?
    if (preg_match('/Kontroler$/', $trida))
    {
        require("kontrolery/" . $trida . ".php");
    }
    // ne ? poté se jedná o model
    else
    {
        require("modely/" . $trida . ".php");
    }

}
//automatické volání funkce na requirování tříd
spl_autoload_register("autoloadFunkce");

//Db Login
Db::connect("127.0.0.1","rocpro","root","");

// instance routeru
$smerovac = new SmerovacKontroler();
//předání URL adresy routeru
$smerovac->zpracuj(array($_SERVER['REQUEST_URI']));
//vypsání pohledu
$smerovac->vypisPohled();


