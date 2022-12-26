<?php
require "dbBroker.php";
require "models/Tim.php";

$timovi = Tim::vratiTimove($konekcija);

foreach ($timovi as $tim){

    ?>
    <option value="<?= $tim->timID ?>"><?= $tim->tim . " - " . $tim->drzava ?> </option>

<?php
}
?>