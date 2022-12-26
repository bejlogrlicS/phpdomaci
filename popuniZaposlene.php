<?php
require "dbBroker.php";
require "models/Zaposleni.php";

$zaposleni = Zaposleni::vratiZaposlene($konekcija);

foreach ($zaposleni as $zap){

    ?>
    <option value="<?= $zap->zaposleniID ?>"><?= $zap->imeZap . " " . $zap->prezimeZap ?> </option>

<?php
}
?>