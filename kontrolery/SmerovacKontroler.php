<?php

class SmerovacKontroler extends Kontroler
{

    protected $kontroler;

    public function zpracuj($parametry)
    {

        $naparsovanaURL = $this->parsujURL($parametry[0]);
        if (empty($naparsovanaURL[0]))
        {
            $this->kontroler = new HomepageKontroler();
        }
        else{
            $tridaKontroleru = $this->pomlckyDoVelbloudiNotace(array_shift($naparsovanaURL)) . 'Kontroler';
            if (file_exists('kontrolery/' . $tridaKontroleru . '.php'))
            {
                $this->kontroler = new $tridaKontroleru;
            }
            else
            {
                $this->presmeruj('error');
            }
        }



        $this->kontroler->zpracuj($naparsovanaURL);
        $this->data['titulek'] = $this->kontroler->hlavicka['titulek'];
        $this->data['popis'] = $this->kontroler->hlavicka['popis'];
        $this->pohled = 'rozlozeni';

        $this->data['zpravy'] = $this->vratZpravy();
    }

    private function parsujURL($url)
    {
        $naparsovanaURL = parse_url($url);
        $naparsovanaURL['path'] = ltrim($naparsovanaURL['path'], "/");
        $naparsovanaURL['path'] = trim($naparsovanaURL['path']);

        $rozdelenaCesta = explode("/", $naparsovanaURL['path']);
        return $rozdelenaCesta;
    }

    private function pomlckyDoVelbloudiNotace($text)
    {
        $veta = str_replace("-", " ", $text);
        $veta = ucwords($veta);
        $veta = str_replace(" ", "", $veta);
        return $veta;
    }



}