<?php
include "konekcija.php";
include "modeli/vrsta.php";
include "modeli/film.php";

$vrste = Vrsta::vratiSve($mysqli);

?>

<html>

<head>
    <?php
    include('head.php');
    ?>

    <title>Pretraga filmova</title>

    <script>
        function find() {

            var pretraga = $("#vrsta").val();
            $.ajax({
                url: "pretragafilmova.php",
                data: "id_vrste=" + pretraga,
                success: function (result) {
                    $('#output').html(result);
                },

            });

        }
    </script>
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
    <div id="find-form" class="row form-container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="" method="POST" role="form">
                <div class="form-group">
                    <label for="vrsta">Vrsta filma:</label>
                    <div class="d-flex">
                        <select class="form-control" name="vrsta" id="vrsta">
                            <?php foreach ($vrste as $v): ?>
                                <option value="<?php echo $v->id_vrste; ?>">
                                    <?php echo $v->naziv_vrste; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <button type="button" id="btn_find" name="pronadji" class="btn-round-custom"
                            onclick="find()">Pronađi</button>
                    </div>

                </div>

            </form>
            <div id="output">

            </div>

        </div>
        <div class="col-md-2"></div>
    </div>


</body>


</html>