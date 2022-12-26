<?php
require "dbBroker.php";
require "models/Igrac.php";

$sport = trim($_GET['sport']);
$sortiranje = trim($_GET['sortiranje']);

$igraci = Igrac::pretraziIgrace($sport, $sortiranje, $konekcija);

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Sport</th>
            <th>Sportista</th>
            <th>Tim</th>
        </tr>
    </thead>
    <tbody>
 <?php

foreach ($igraci as $igrac){
    ?>
    <tr>
        <td><?= $igrac->sport?></td>
        <td><?= $igrac->ime . " " . $igrac->prezime?></td>
        <td><?= $igrac->tim?></td>

    </tr>
<?php
}
?>
    </tbody>
</table>

