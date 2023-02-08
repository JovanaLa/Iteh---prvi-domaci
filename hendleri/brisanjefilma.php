<?php
include "konekcija.php";

$id = $_GET['id'];
$sql = "DELETE FROM film WHERE id_filma='" . $id . "'";
$mysqli->query($sql) or die($sql);

header("Location:izmenafilma.php");
?>