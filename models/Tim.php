<?php

class Tim {

    public $timID;
    public $tim;
    public $drzava;

    public function __construct($timID=null,$naziv=null,$drzava=null)
    {
        $this->timID = $timID;
        $this->naziv=$naziv;
        $this->drzava=$drzava;
    }

    public static function vratiTimove(mysqli $konekcija)
    {
        $sql = "SELECT * FROM tim";
        $resultSet = $konekcija->query($sql);
        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

}

