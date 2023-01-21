<?php

class Tip {

    public $tipId;
    public $tip;

    public function __construct($tipId=null,$tip=null)
    {
        $this->tipId = $tipId;
        $this->tip=$tip;
    }

    public static function vratiTipove(mysqli $conn)
    {
        $query = "SELECT * FROM tip";
        $rs = $conn->query($query);
        $tipovi = [];
        while($tip = $rs->fetch_object()){
            $tipovi[] = $tip;
        }
        return $tipovi;
    }

}

