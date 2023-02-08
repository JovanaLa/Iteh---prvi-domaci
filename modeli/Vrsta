<?php

class Vrsta
{
    public $id_vrste;
    public $naziv_vrste;

    public function __construct($id_vrste, $naziv_vrste)
    {
        $this->id_vrste = $id_vrste;
        $this->naziv_vrste = $naziv_vrste;
    }

    public static function vratiSve($db)
    {
        $query = "SELECT * FROM vrsta";
        $result = $db->query($query);
        $array = [];
        while ($r = $result->fetch_assoc()) {
            $vrsta = new Vrsta($r['id_vrste'], $r['naziv_vrste']);
            array_push($array, $vrsta);
        }
        return $array;

    }

}

?>