<?php

class LoginKontroler extends Kontroler
{
    function zpracuj($parametry)
    {

        $this->hlavicka["titulek"] ="Přihlášení";
        $this->pohled="login";

        if(isset($_POST['odeslat'])){
            if ($_POST['jmeno'] == 'admin' && $_POST['heslo'] == '123456789'){
                header("Location: /admin");
            }
            else
            {
                echo("<p class='error-login'>Špatné jméno nebo heslo</p>");
            }
        }

    }
}