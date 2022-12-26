<?php

require "dbBroker.php";
require "models/Igrac.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$poruka = "";

if(isset($_POST['dodaj'])){
    $ime = trim($_POST['ime']);
    $prezime = trim($_POST['prezime']);
    $tim = trim($_POST['tim']);
    $sport = trim($_POST['sport']);

    if(Igrac::dodajIgraca($ime, $prezime, $tim, $sport, $konekcija)){
        header("Location: pocetna.php");
    }else{
        $poruka = "Igrac nije sačuvan";
    }

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

    <div id="header"></div>
    <div id="header2"></div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" data-wow-delay="0.1s" style="max-width: 600px;">
                <h3 id="por"><?= $poruka; ?></h3>
            </div>
            <div class="row">
                <form method="post" action="">
                    <label for="ime">Ime</label>
                    <input type="text" id="ime" name="ime" class="form-control">
                    <label for="prezime">Prezime</label>
                    <input type="text" id="prezime" name="prezime" class="form-control">
                    <label for="sport">Sport</label>
                    <select id="sport" name="sport" class="form-control">
                    </select>
                    <label for="tim">Tim</label>
                    <select id="tim" name="tim" class="form-control">
                    </select>
                    
                    <br>
                    <button class="BtnForm" type="submit" name="dodaj" >Dodaj</button>
                    <br><br>
                    <a href="pocetna.php", class="BtnForm">Nazad</a>

                </form>
            </div>
            <div style="height: 40px"></div>
            <br/>
            <br/>

        </div>
    </div>

    <div id="footer"></div>
 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        function popuniSportove() {

            $.ajax({
                url: 'popuniSportove.php',
                success: function (data) {
                   $("#sport").html(data);
                }
            });
        }
        popuniSportove();
 
        function popuniTimove() {

            $.ajax({
                url: 'popuniTimove.php',
                success: function (data) {
                $("#tim").html(data);
                }
            });
        }
        popuniTimove();


    </script>

</body>

</html>