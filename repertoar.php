<!DOCTYPE html>

<?php
include "konekcija.php";
include "modeli/vrsta.php";
include "modeli/film.php";


?>
<html>

<head>
  <?php
  include('head.php');
  ?>

  <title>Repertorar</title>
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
  <div id="welcome-div" class="row form-container">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    </div>
    <div class="row">
      <div class="col-3">
        <label>Sortiraj po naslovu</label>
        <select id='sortiraj' class='form-control'>
          <option value="asc">A</option>
          <option value="desc">Z</option>
        </select>
      </div>
      <div class="col-3">
        <label>Pretrazi po ceni</label>
        <input type="text" id="cena" onkeyup="funkcijaZaPretragu1()" placeholder="Pretrazi filmove">
      </div>
      <div class="col-3">
        <label>Pretrazi po naslov </label>
        <input type="text" id="naslov" onkeyup="funkcijaZaPretragu2()" placeholder="Pretrazi filmove">
      </div>
    </div>

    <div class="row">
      <div class='table_div'>
        <table class="table">
          <thead class="thead-red" ;">
            <tr>
              <th scope="col"></th>
              <th scope="col">Naslov</th>
              <th scope="col">Cena</th>
              <th scope="col">Trajanje</th>
              <th scope="col">Vreme projekcije</th>
            </tr>
          </thead>

          <tbody id='filmovi'>
      </div>

      </tbody>
      </table>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
      let filmovi = [];
      let filmoviFiltrirano = []



      $(document).ready(function () {


        $.getJSON('vratiFilmove.php', function (data) {
          console.log(filmovi);

          if (!data.status) {
            alert(data.greska);
            return;
          }
          filmovi = data.filmovi;

          filmovi.sort(function (a, b) {
            return a.naslov.localeCompare(b.naslov);

          })

          napuniTabelu(filmovi);
        });




        $('#sortiraj').change(function () {
          const option = $('#sortiraj').val();
          if (option === 'asc') {
            filmovi.sort(function (a, b) {
              return a.naslov.localeCompare(b.naslov);

            })
          } else {
            filmovi.sort(function (a, b) {
              console.log(b.naslov);
              return b.naslov.localeCompare(a.naslov);
            })
          }

          napuniTabelu(filmovi);
        })
      })

      function funkcijaZaPretragu1() {
        input = document.getElementById("cena");
        filter = input.value;
        filmoviFiltrirano = filmovi;

        if (filter != "") {
          filmoviFiltrirano = filmovi.filter((element) => element.cena == filter);
        }
        napuniTabelu(filmoviFiltrirano);
      }

      function funkcijaZaPretragu2() {
        input = document.getElementById("naslov");
        filter = input.value;
        filmoviFiltrirano = filmovi;

        if (filter != "") {
          filmoviFiltrirano = filmovi.filter((element) => element.naslov == filter);
        }
        napuniTabelu(filmoviFiltrirano);
      }
      function napuniTabelu(niz) {
        $('#filmovi').html('');
        let i = 0;
        for (let film of niz) {
          $('#filmovi').append(`
            <tr>
              <td>${++i}</td>
              <td>${film.naslov}</td>
              <td>${film.cena}</td>
              <td>${film.trajanje}</td>
              <td>${film.vreme_projekcije}</td>
            </tr>
          `)
        }
      }

    </script>



</body>

</html>