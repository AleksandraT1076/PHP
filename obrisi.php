<?php

include 'konekcija.php';
require "models/instrument.php";

$instrument = trim($_POST['instrument']);

if(Instrument::obrisi($instrument, $conn)){
    echo true; 
}else{
    echo false;
}
