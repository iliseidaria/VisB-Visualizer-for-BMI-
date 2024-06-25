<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-comparison.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisB</title>
    <style>

.country-checkboxes,
.year-checkboxes,
.table-checkboxes {
    padding: 10px; /* Adaugă un padding de 10px la fiecare fieldset */
}

.country-checkboxes label,
.year-checkboxes label,
.table-checkboxes label {
    display: inline-block;
    margin-right: 10px;
    margin-bottom: 5px;
    padding: 5px 10px;
    background-color: #333;
    border: 1px solid #ccc;
    border-radius: 5px;
}

    </style>
</head>

<body>
    <main>
        <div class="fake-body">
            <div class="container">
                <div class="header">
                    <p class="titlu">Visualizer for BMI</p>
                </div>

                <div class="bara">
                    <nav class="navbar">
                        <ul>
                            <li><a href="/VisB-Visualizer-for-BMI/">Home</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/statistics">Statistics</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/comparison">Comparison</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/visualization">Visualization</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/contact">Contact</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/login">Login</a></li>
                        </ul>
                    </nav>
                </div>

                <!-- Responsive Menu -->
                <div id="responsive-menu-container" class="responsive-menu-container">
                    <div id="responsive-menu-bar" class="responsive-menu-bar">
                        <span>Menu</span>
                    </div>
                    <div id="responsive-menu">
                        <ul id="primary-menu">
                            <li><a href="/VisB-Visualizer-for-BMI/">Home</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/statistics">Statistics</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/comparison">Comparison</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/visualization">Visualization</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/contact">Contact</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/login">Login</a></li>
                        </ul>
                        <div id="menu-close-bar" class="menu-close-bar"> Close</div>
                    </div>
                </div>

                <div class="text-stuff">
                    <div class="button-bar">
                        <form action="" method="get">
                            <fieldset class="country-checkboxes">
                                <legend>Select countries:</legend>
                                <?php
                                // Array of countries
                                $countries = [
                                    "Austria", "Belgium", "Bulgaria", "Croatia", "Cyprus", "Czech Republic",
                                    "Denmark", "Estonia", "Finland", "France", "Germany", "Greece",
                                    "Hungary", "Ireland", "Italy", "Latvia", "Lithuania", "Luxembourg",
                                    "Malta", "Netherlands", "Poland", "Portugal", "Romania", "Slovakia",
                                    "Slovenia", "Spain", "Sweden"
                                ];

                                // Display checkboxes for each country
                                foreach ($countries as $country) {
                                    echo "<label><input type='checkbox' name='countries[]' value='$country'>$country</label>";
                                }
                                ?>
                            </fieldset>

                            <fieldset class="year-checkboxes">
                                <legend>Select year:</legend>
                                <label><input type="checkbox" name="years[]" value="2008">2008</label>
                                <label><input type="checkbox" name="years[]" value="2014">2014</label>
                                <label><input type="checkbox" name="years[]" value="2017">2017</label>
                                <label><input type="checkbox" name="years[]" value="2019">2019</label>
                                <label><input type="checkbox" name="years[]" value="2022">2022</label>
                            </fieldset>

                            <fieldset class="table-checkboxes">
                                <legend>Select table:</legend>
                                <label><input type="checkbox" name="tables[]" value="yearlydata">Overweight</label>
                                <label><input type="checkbox" name="tables[]" value="yearly_data_pre_obese">Pre-Obese</label>
                                <label><input type="checkbox" name="tables[]" value="yearly_data_obese">Obese</label>
                            </fieldset>

                            <input class="submit" type="submit" value="Submit">
                        </form>
                    </div>
                </div>

                <div class="results">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        require_once "Model/CountryModel.php";

                        $selectedCountries = $_GET['countries'] ?? [];
                        $selectedYears = $_GET['years'] ?? [];
                        $selectedTables = $_GET['tables'] ?? [];

                        $countryModel = new CountryModel();

                        if (!empty($selectedCountries) && !empty($selectedYears) && !empty($selectedTables)) {
                            echo "<div id='comparisonResults' class='result-section'>";
                            echo "<h2>Results</h2>";
                            echo "<table>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Country</th>";
                            echo "<th>Year</th>";
                            echo "<th>Percentage</th>";
                            echo "<th>Table</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                            foreach ($selectedCountries as $country) {
                                foreach ($selectedYears as $year) {
                                    foreach ($selectedTables as $table) {
                                        $data = $countryModel->getCountryData($country, $year, $table);

                                        switch ($table) {
                                            case 'yearlydata':
                                                $db_table = 'Overweight';
                                                break;
                                            case 'yearly_data_pre_obese':
                                                $db_table = 'Pre-obese';
                                                break;
                                            case 'yearly_data_obese':
                                                $db_table = 'Obese';
                                                break;
                                        }
                                        foreach ($data as $row) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                                            echo "<td>" . (isset($row['percentage']) ? htmlspecialchars($row['percentage']) : 'Missing data') . "</td>";
                                            echo "<td>" . htmlspecialchars($db_table) . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                }
                            }
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        } else {
                            echo "<div id='comparisonResults' class='result-section'>";
                            echo "Please select at least one country, one year, and one table.";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>

                <div class="export">
                    <div class="export-text">
                        <p>Export as:</p>
                    </div>
                    <div class="action-buttons">
                        <button type="button">CSV</button>
                        <button type="button">WebP</button>
                        <button type="button">SVG</button>
                    </div>
                </div>

                <div class="footer"></div>
            </div>

            <footer></footer>
        </div>
    </main>

    <script type='text/javascript' src='main.js'></script>
</body>

</html>
