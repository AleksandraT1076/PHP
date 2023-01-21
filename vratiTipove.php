<?php

require 'konekcija.php';
require "models/tip.php";

$tipovi = Tip::vratiTipove($conn);

foreach ($tipovi as $tip) {
?>
<option value="<?= $tip->tipId ?>"><?= $tip->tip?></option>
<?php
}