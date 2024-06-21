<?php
require_once "../Model/CountryModel.php";

$countryModel = new CountryModel();
$minValue = $countryModel->getMinValue();

if ($minValue) {
    echo "<h2>Min Value</h2>";
    echo "<p>Anul: " . htmlspecialchars($minValue[0]['year']) . ", Valoarea minimă: " . htmlspecialchars($minValue[0]['percentage']) . "</p>";
} else {
    echo "<p>Nu s-au găsit date pentru valoarea minimă.</p>";
}
?>
