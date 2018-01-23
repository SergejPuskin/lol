<?php


abstract class Kontroler
{

    //pole pro uložení dat pro pohled
    protected $data = array();
    //prázdná proměnná pro pohled
    protected $pohled = "";
    //data pro head
    protected $hlavicka = array('titulek' => '', 'popis' => '');


    abstract function zpracuj($parametry);

    //pokud je zadán pohled, vyrenderuje se
    public function vypisPohled()
    {
        if ($this->pohled)
        {
            extract($this->osetri(($this->data))); // z pole "data" udělá ošetřené proměnné s hodnotami
            extract($this->data, EXTR_PREFIX_ALL, ""); // z pole "data" udělá neošetřené proměnné s hodnotami
            require("pohledy/" . $this->pohled . ".phtml"); // načte pohled
        }
    }

    //přesměruje na stránku v parametru
    public function presmeruj($url)
    {
        header("Location: /$url");
        header("Connection: close");
        exit;
    }

    // ošetřuje html entity
    private function osetri($x = null)
    {
        if (!isset($x))
        {
            return null;
        }
        elseif (is_string($x))
        {
            return htmlspecialchars($x, ENT_QUOTES);
        }
        elseif (is_array($x))
        {
            foreach ($x as $k => $v)
            {
                $x[$k] = $this->osetri($v);
            }
            return $x;
        }
        else
        {
            return $x;
        }
    }


    public function pridejZpravu($zprava)
    {
        if (isset($_SESSION['zpravy']))
        {
            $_SESSION['zpravy'][] = $zprava;
        }
        else
        {
            $_SESSION['zpravy'] = array($zprava);
        }
    }

    public static function vratZpravy()
    {
        if (isset($_SESSION['zpravy']))
        {
            $zpravy = $_SESSION['zpravy'];
            unset($_SESSION['zpravy']);
            return $zpravy;
        }
        else
        {
            return array();
        }
    }
}