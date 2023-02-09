<!DOCTYPE html>
<div id="menu" class="row">
    <div class="col-12 topnav" id="myTopnav">
        <a href="../index.php">Početna</a>
        <a href="unosfilma.php">Unos novih filmova</a>
        <a href="../repertoar.php">Repertoar</a>
        <a href="../pretraga.php">Pretraga</a>

    </div>
</div>
<?php
include "../konekcija.php";
include "../modeli/film.php";
include "../modeli/vrsta.php";


$vrsta = Vrsta::vratiSve($mysqli);

if (isset($_POST['dodaj'])) {

    $naslov = trim($_POST['naslov']);
    $cena = trim($_POST['cena']);
    $trajanje = trim($_POST['trajanje']);
    $vreme_projekcije = trim($_POST['vreme_projekcije']);
    $vrsta = $_POST['vrsta'];



    $data = array(
        "naslov" => $naslov,
        "cena" => $cena,
        "trajanje" => $trajanje,
        "vreme_projekcije" => $vreme_projekcije,
        "id_vrste" => $vrsta,
    );

    $film = new Film(null, $naslov, $cena, $trajanje, $vreme_projekcije, $vrsta);

    $film->ubaciFilm($data, $mysqli);

}
?>

<html>


<head>

    <title>Unos novoh filma</title>
</head>

<body>
    <div id="background-img">
    </div>



    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">

        </div>
    </div>
    <div id="inser-form" class="row form-container">
        <div class="col-md-2"></div>
        <div id="teatar-bg-img" class="col-md-4"></div>
        <div class="col-md-4">
            <form name="unosPredstave" action="" onsubmit="return validateForm()" method="POST" role="form">
                <div class="form-group">
                    <label for="naslov">Naslov filma:</label>
                    <input type="text" class="form-control" name="naslov" id="naslov"
                        placeholder="Unesite naslov filma">
                </div>
                <div class="form-group">
                    <label for="cena">Cena karte:</label>
                    <input type="text" class="form-control" name="cena" id="cena" placeholder="Unesite cenu karte">

                </div>
                <div class="form-group">
                    <label for="trajanje">Trajanje filma:</label>
                    <input type="text" class="form-control" name="trajanje" id="trajanje"
                        placeholder="Unesite trajanje filma">

                </div>

                <div class="form-group">
                    <label for="vreme_projekcije">Datum izvodjenja filma:</label>
                    <input type="text" class="form-control" name="vreme_projekcije" id="vreme_projekcije"
                        placeholder="Unesite vreme projekcije filma">

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
                    <button type="submit" id="dodaj" name="dodaj" class="btn-round-custom">Dodaj</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>