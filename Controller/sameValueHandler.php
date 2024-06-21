<?php
require_once "../Model/CountryModel.php";

$countryModel = new CountryModel();
$sameValue = $countryModel->getSameValue();

if ($sameValue) {
    echo "<h2>Same Value</h2>";
    echo "<p>Anul: " . htmlspecialchars($sameValue[0]['year']) . ", Valoarea: " . htmlspecialchars($sameValue[0]['percentage']) . "</p>";
} else {
    echo "<p>Nu s-au găsit date pentru aceeași valoare.</p>";
}
?>
