<?php

class Igrac{

    public $igracID;
    public $ime;
    public $prezime;
    public $timID;
    public $sportID;
    

    public function __construct($igracID=null,$ime=null,$prezime=null,$timID=null,$sportID=null)
    {
        $this->igracID = $igracID;
        $this->ime=$ime;
        $this->prezime=$prezime;
        $this->timID=$timID;
        $this->sportID=$sportID;
    }

    
    public static function pretraziIgrace($sport, $sortiranje, mysqli $konekcija)
    {
        $sql = "SELECT * FROM igrac i join tim t on t.timID = i.timID join sport s on i.sportID = s.sportID";
        if($sport != "svi"){
            $sql .= " WHERE i.sportID = " . $sport;
        }
        $sql.= " ORDER BY i.ime " . $sortiranje;


        $resultSet = $konekcija->query($sql);
        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

    public static function dodajIgraca($ime, $prezime, $timID, $sportID, mysqli $konekcija)
    {
        return $konekcija->query("INSERT INTO igrac VALUES(null, '$ime' , '$prezime', '$timID' , '$sportID' )");  
    }

    public static function izmeniTim($igracID, $timID, mysqli $konekcija)
    {
        return $konekcija->query("UPDATE igrac SET timID = '$timID' WHERE igracID = $igracID");
    }

    public static function obrisiIgraca($igracID, mysqli $konekcija)
    {
        return $konekcija->query("DELETE FROM igrac WHERE igracID = $igracID");
    }
}

