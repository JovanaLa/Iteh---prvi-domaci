<?php

include "modeli/film.php";
require 'konekcija.php';


$resultSet = Film::vratiFilmove($mysqli);
$response = [];

if (!$resultSet) {
    $response['status'] = 0;
    $response['greska'] = $mysqli->getMysqli()->error;
} else {
    $response['status'] = 1;
    while ($row = $resultSet->fetch_object()) {
        $response['filmovi'][] = $row;
    }
}
echo json_encode($response);

?>