<?php
include 'konekcija.php';
require "models/instrument.php";

$tip = trim($_GET['tip']);
$cena = trim($_GET['cena']);

$instrumenti = Instrument::pretraga($tip, $cena, $conn);

?>
    <table class="table">
        <thead>
            <tr>
                <th>Model</th>
                <th>Cena</th>
                <th>Tip</th>
                <th>Proizvodjac</th>
            </tr>
        </thead>
    <tbody>

<?php

foreach ($instrumenti as $instrument) {
    ?>
    <tr>  
        <td><?= $instrument->model?></td>
        <td><?= $instrument->cena . " din"?></td>
        <td><?= $instrument->tip?></td>
        <td><?= $instrument->proizvodjac?></td>
    </tr>
    <?php
}
?>
    </tbody>
</table>
