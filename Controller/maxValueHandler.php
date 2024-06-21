<?php
require_once "../Model/CountryModel.php";

$countryModel = new CountryModel();
$maxValue = $countryModel->getMaxValue();

if ($maxValue) {
    echo "<h2>Max Value</h2>";
    echo "<p>Anul: " . htmlspecialchars($maxValue[0]['year']) . ", Valoarea maximă: " . htmlspecialchars($maxValue[0]['percentage']) . "</p>";
} else {
    echo "<p>Nu s-au găsit date pentru valoarea maximă.</p>";
}

?>