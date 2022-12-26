<?php
require "dbBroker.php";
require "models/Sport.php";

$sportovi = Sport::vratiSportove($konekcija);

foreach ($sportovi as $sport){

    ?>
    <option value="<?= $sport->sportID ?>"><?=$sport->sport?> </option>

<?php
}
?>