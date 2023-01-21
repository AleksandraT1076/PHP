<?php

include 'konekcija.php';
require "models/instrument.php";

$instrumenti = Instrument::vrati($conn);

foreach ($instrumenti as $instrument) {

?>  
<option value="<?= $instrument->instrumentId ?>"><td><?= $instrument->model . " - " . $instrument->proizvodjac . " (" . $instrument->cena . " din )" ?></td> 
<?php
}
?>