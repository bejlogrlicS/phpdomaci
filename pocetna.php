<?php

require "dbBroker.php";
require "models/Korisnik.php";


session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
} 

if (isset($_COOKIE["user"])){
    $poruka="Zdravo, " . $_COOKIE["user"] . "!";
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sport</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

    <div class="container-xxl py-5">
        <div class="container">
        <center><h5 id="poruka"><?= $poruka; ?></h5></center>
            <div class="row" id="rowc">
                <div class="col-md-5">
                <label for="sport">Sport</label>
                    <select class="form-control" id="sport" onchange="filtriraj()">
                    </select>
                </div>
                <div class="col-md-5">
                <label for="sortiranje">Sortiranje po imenu</label>
                    <select class="form-control" id="sortiranje" onchange="filtriraj()">
                        <option value="asc">A-Z</option>
                        <option value="desc">Z-A</option>
                    </select>
                </div>
            </div>
            </div>
            <br/>
            <br/>
            <div class="row g-4" id="rezultat" >
            </div>
        
            <center>
            <a href="dodaj.php", class="BtnForm">Dodaj igrača</a>
            <a href="izmeni.php", class="BtnForm">Promeni tim</a>
            <a href="obrisi.php", class="BtnForm">Obrisi igrača</a>
            </center>

        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function popuni() {
            let sport = 'svi';
            let sortiranje = 'asc';
            $.ajax({
                url: "pretragaIgraca.php",
                data: {
                    sport: sport,
                    sortiranje: sortiranje
                },
                success: function (podaci) {
                    $("#rezultat").html(podaci);
                }
            });
        }
        popuni();

        function popuniSportove() {
            $.ajax({
                url: 'popuniSportove.php',
                success: function (data) {
                   var data2= "<option value='svi'>Svi sportovi</option>" + data; 
                   $("#sport").html(data2);
                }
            });
        }
        popuniSportove();
 


        function filtriraj() {
            let sport = $("#sport").val();
            let sortiranje = $("#sortiranje").val();
            $.ajax({
                url: 'pretragaIgraca.php',
                data: {
                    sport: sport,
                    sortiranje: sortiranje
                },
                success: function (data) {
                    $("#rezultat").html(data);
                }
            });
        }

    </script>

</body>
</html>
