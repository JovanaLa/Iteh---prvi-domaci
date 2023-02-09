<!DOCTYPE html>

<?php
include "konekcija.php";
include "modeli/vrsta.php";
include "modeli/film.php";

$id = $_GET['id'];

$film = Film::vratiSve($mysqli, " where f.id_filma=" . $id);
$vrsta = Vrsta::vratiSve($mysqli);



if (isset($_POST['dodaj'])) {

    $naslov = trim($_POST['naslov']);
    $cena = trim($_POST['cena']);
    $trajanje = trim($_POST['trajanje']);
    $vreme_projekcije = trim($_POST['vreme_projekcije']);
    $vrsta = $_POST['vrsta'];

    $mysqli->query("UPDATE film SET naslov='$naslov', cena='$cena', trajanje='$trajanje', vreme_projekcije ='vreme_projekcije,id_vrste='$vrsta' WHERE id_film=$id");
    header('location: izmenafilma.php');
}
?>

<html>

<head>


    <title>Izmena filma</title>

</head>

<body>
    <div id="background-img">
    </div>
    <?php
        include('header.php');
    ?>
    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
        </div>
    </div>
    <div id="inser-form" class="row form-container">
        <div class="col-md-2"></div>
        <div id="teatar-bg-img" class="col-md-4"></div>
        <div class="col-md-4">

            <form style="padding: 15px;" class="form-horizontal" method="post" action="" role="form">
                <div class="form-group">
                    <label for="naslov">Naslov filma:</label>
                    <input type="text" class="form-control" name="naslov" id="naslov"
                        value="<?php echo $film[0]->naslov; ?>">
                </div>
                <div class="form-group">
                    <label for="cena">Cena karte:</label>
                    <input type="text" class="form-control" name="cena" id="cena" value="<?php echo $film[0]->cena; ?>">
                </div>
                <div class="form-group">
                    <label for="trajanje">Trajanje filma:</label>
                    <input type="text" class="form-control" name="trajanje" id="trajanje"
                        value="<?php echo $film[0]->trajanje; ?>">
                </div>
                <div class="form-group">
                    <label for="vreme_projekcije">Vreme projekcije:</label>
                    <input type="text" class="form-control" name="vreme_projekcije" id="vreme_projekcije"
                        value="<?php echo $film[0]->vreme_projekcije; ?>">
                </div>
                <div class="form-group">
                    <label for="vrsta">Vrsta filma:</label>
                    <select class="form-control" name="vrsta" id="vrsta">
                        <?php foreach ($vrsta as $v): ?>
                            <option value="<?php echo $v->id_vrste; ?>">
                                <?php echo $v->naziv_vrste; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" id="update" name="update" class="btn-round-custom">Sačuvaj izmene</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>