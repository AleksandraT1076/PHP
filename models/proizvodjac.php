<?php

class Proizvodjac{

    public $proizvodjacId;
    public $proizvodjac;

    public function __construct($proizvodjacId=null,$proizvodjac=null)
    {
        $this->proizvodjacId = $proizvodjacId;
        $this->proizvodjac=$proizvodjac;
    }

    public static function vratiProizvodjace(mysqli $conn)
    {
        $sql = "SELECT * FROM proizvodjac";
        $rs = $conn->query($sql);
        $proizvodjaci = [];

        while($proizvodjac = $rs->fetch_object()){
            $proizvodjaci[] = $proizvodjac;
        }
        return $proizvodjaci;
    }

}

