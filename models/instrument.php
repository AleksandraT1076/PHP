<?php

class Instrument{

   public $instrumentId;
   public $model;
   public $cena;
   public $proizvodjacId;
   public $tipId;
  
    public function __construct($instrumentId=null, $model=null, $cena=null, $proizvodjacId=null, $tipId=null)
    {
        $this->instrumentId = $instrumentId;
        $this->model=$model;
        $this->cena=$cena;
        $this->proizvodjacId=$proizvodjacId;
        $this->tipId=$tipId;
    }

    public static function pretraga($tipId, $cena, mysqli $conn)
    {
        $query = "SELECT * FROM instrument i join tip t on i.tipId = t.tipId join proizvodjac p on i.proizvodjacId = p.proizvodjacId";
        if($tipId != "0"){
            $query .= " WHERE i.tipId = " . $tipId;
        }
        $query.= " ORDER BY i.cena " . $cena;
        $rs = $conn->query($query);
        $instrumenti = [];
        while($instrument = $rs->fetch_object()){
            $instrumenti[] = $instrument;
        }
        return $instrumenti;
    }

    public static function vrati(mysqli $conn)
    {
        $query= "SELECT * FROM instrument i join tip t on i.tipId = t.tipId join proizvodjac p on i.proizvodjacId = p.proizvodjacId";
        $rs = $conn->query($query);
        $instrumenti = [];
        while($instrument = $rs->fetch_object()){
            $instrumenti[] = $instrument;
        }
        return $instrumenti;
    }

    public static function dodaj($model, $cena, $proizvodjacId, $tipId, mysqli $conn)
    {
        $query = "INSERT INTO instrument VALUES (null, '$model' , '$cena', '$proizvodjacId', '$tipId')";
        return $conn->query($query);
    }

    public static function izmeni($id, $cena, mysqli $conn)
    {
        $query = "UPDATE instrument SET cena = '$cena' WHERE instrumentId = '$id'";
        return $conn->query($query);
    }

    public static function obrisi($id, mysqli $conn)
    {
        $query = "DELETE FROM instrument WHERE instrumentId = $id";
        return $conn->query($query);
    }
}