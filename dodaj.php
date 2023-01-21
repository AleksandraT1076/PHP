<?php

include 'konekcija.php';
require "models/instrument.php";

$model = trim($_POST['model']);
$cena = trim($_POST['cena']);
$proizvodjac = trim($_POST['proizvodjac']);
$tip = trim($_POST['tip']);

if(Instrument::dodaj($model, $cena, $proizvodjac, $tip, $conn)){
    echo true; 
}else{
    echo false;
}
