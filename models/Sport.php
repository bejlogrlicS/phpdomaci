<?php


class Sport{

   public $sportID;
   public $sport;
  
    public function __construct($sportID=null, $sport=null)
    {
        $this->sportID = $sportID;
        $this->sport=$sport;
    }

    public static function vratiSportove(mysqli $konekcija)
    {
        $sql = "SELECT * FROM sport";
        $resultSet = $konekcija->query($sql);
        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }
}