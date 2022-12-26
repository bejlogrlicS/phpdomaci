<?php
require "dbBroker.php";
require "models/Igrac.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$poruka = "";

if(isset($_POST['izmeni'])){
    $igrac = trim($_POST['igrac']);
    $tim = trim($_POST['tim']);

    if(Igrac::izmeniTim($igrac, $tim, $konekcija)){
        header("Location: pocetna.php");
    }else{
        $poruka = "Tim nije izmenjen";
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
 
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h3 id="por"><?= $poruka; ?></h3>
            </div>
            <div class="row">
                <form method="post" action="">
                    <label for="igrac">Igrac</label>
                    <select id="igrac" name="igrac" class="form-control">
                    </select>
                    <label for="tim">Tim</label>
                    <select id="tim" name="tim" class="form-control">
                    </select>

                    <br>
             
                    <button class="BtnForm" type="submit" name="izmeni">Izmeni</button>
                    <br> <br>
                    <a href="pocetna.php", class="BtnForm">Nazad</a>

                </form>
            </div>

        </div>

    </div> 
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script src="js/main.js"></script>

    <script>
    function popuniIgrace() {
            $.ajax({
                url: 'popuniIgrace.php',
                success: function (data) {
                   $("#igrac").html(data);
                }
            });
        }
        popuniIgrace();

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