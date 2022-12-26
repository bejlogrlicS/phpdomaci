<?php
require "dbBroker.php";
require "models/Igrac.php";

$igraci = Igrac::pretraziIgrace("svi", "asc", $konekcija);;

foreach ($igraci as $igrac){

    ?>
    <option value="<?= $igrac->igracID ?>"><?= $igrac->ime . " " . $igrac->prezime?></option>

<?php
}
?>