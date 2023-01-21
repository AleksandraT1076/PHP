<?php

require 'konekcija.php';
require "models/proizvodjac.php";

$proizvodjaci = Proizvodjac::vratiProizvodjace($conn);

foreach ($proizvodjaci as $proizvodjac) {
?>
<option value="<?= $proizvodjac->proizvodjacId ?>"><?= $proizvodjac->proizvodjac?></option>
<?php
}