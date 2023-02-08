<!DOCTYPE html>

<?php
include "konekcija.php";
include "modeli/vrsta.php";
include "modeli/film.php";

$order = '';

$filmovi = Film::vratiSve($mysqli, $order);

?>


<html>

<head>

    <title>Repertorar</title>
</head>

<body>
    <div id="background-img">
    </div>

    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
        </div>
    </div>
    <div id="find-form" class="row form-container">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <div class="table-responsive" id="tabela-film">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Naslov</a></th>
                            <th>Cena</a></th>
                            <th>Trajanje</a></th>
                            <th>Vreme projekcije</a></th>
                            <th>Vrsta filma</th>
                            <th>Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($filmovi as $film):
                            ?>
                            <tr>
                                <td>
                                    <?php echo $film->naslov; ?>
                                </td>
                                <td>
                                    <?php echo $film->cena; ?>
                                </td>
                                <td>
                                    <?php echo $film->trajanje; ?>
                                </td>
                                <td>
                                    <?php echo $film->vreme_projekcije; ?>
                                </td>
                                <td>
                                    <?php echo $film->vrsta_fk->naziv_vrste; ?>
                                </td>
                                <td><a href="brisanjefilma.php?id=<?php echo $film->id_filma; ?>">
                                        <img class="icon-images" src="images/trash-can.png" width="20px" height="20px" />
                                    </a>
                                    <a href="izmenafilma.php?id=<?php echo $film->id_filma; ?>">
                                        <img class="icon-images" src="images/pen.png" width="20px" height="20px" />
                                    </a>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

            <div id="output">

            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
        </div>
        <div class="col-md-2"></div>
    </div>

</body>


</html>