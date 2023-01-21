<?php
include 'konekcija.php';
require "models/instrument.php";

$model = trim($_POST['instrument']);
$cena = trim($_POST['cena']);


if(Instrument::izmeni($model, $cena, $conn)){
    echo true; 
}else{
    echo false;
}
