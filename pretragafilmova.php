<?php
$id = $_GET['id_vrste'];

include "konekcija.php";
include "modeli/film.php";
include "modeli/vrsta.php";


$result = Film::vratiSve($mysqli, " where f.vrsta_fk =" . $id);

$nalepi = '<table class="table "><thead><tr><th>Naslov</th><th>Cena</th><th>Trajanje</th><th>Vreme projekcije</th><th>Vrsta filma</th></thead><tbody>';

foreach ($result as $film) {
    $nalepi = $nalepi . '<tr>';
    $nalepi = $nalepi . '<td>' . $film->naslov . '</td>';
    $nalepi = $nalepi . '<td>' . $film->cena . '</td>';
    $nalepi = $nalepi . '<td>' . $film->trajanje . '</td>';
    $nalepi = $nalepi . '<td>' . $film->vreme_projekcije . '</td>';
    $nalepi = $nalepi . '<td>' . $film->vrsta_fk->naziv_vrste . '</td>';
    $nalepi = $nalepi . '</tr>';
}

$nalepi = $nalepi . '</tbody></table>';


echo ($nalepi);


?>