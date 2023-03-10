<?php

class Film
{

    public $id_filma;
    public $naslov;
    public $cena;
    public $trajanje;
    public $vreme_projekcije;
    public $vrsta_fk;



    public function __construct($id_filma, $naslov, $cena, $trajanje, $vreme_projekcije, $vrsta_fk)
    {
        $this->id_filma = $id_filma;
        $this->naslov = $naslov;
        $this->cena = $cena;
        $this->trajanje = $trajanje;
        $this->vreme_projekcije = $vreme_projekcije;
        $this->vrsta_fk = $vrsta_fk;

    }

    public function ubaciFilm($data, $db)
    {

        if ($data['naslov'] === '' || $data['cena'] === '' || $data['trajanje'] === '' || $data['vreme_projekcije'] === '') {
            echo 'Polja moraju biti popunjena';

        } else {

            $save = $db->query("INSERT INTO film(naslov,cena,trajanje,vreme_projekcije,vrsta_fk) VALUES ('" . $data['naslov'] . "','" . $data['cena'] . "','" . $data['trajanje'] . "','" . $data['vreme_projekcije'] . "','" . $data['id_vrste'] . "')") or die($db->error);
            if ($save) {
                echo 'Film je uspešno dodat';
            } else {
                echo 'Neuspešno dodavanje filma';
            }
        }
    }



    public static function vratiSve($db, $uslov)
    {
        $query = "SELECT * FROM film f JOIN vrsta v ON f.vrsta_fk=v.id_vrste" . $uslov;
        $query = trim($query);
        $result = $db->query($query) or die($db->error);
        $array = [];
        while ($r = $result->fetch_assoc()) {
            $vrsta = new Vrsta($r['id_vrste'], $r['naziv_vrste']);
            $film = new Film($r['id_filma'], $r['naslov'], $r['cena'], $r['trajanje'], $r['vreme_projekcije'], $vrsta);
            array_push($array, $film);
        }
        return $array;
    }

    public static function vratiFilmove($db)
    {
        $query = "SELECT * FROM film f JOIN vrsta v ON f.vrsta_fk=v.id_vrste";
        return $db->query($query);
    }

}


?>