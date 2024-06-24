<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-statistics.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisB</title>
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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="statistics.php">Statistics</a></li>
                            <li><a href="comparasion.php">Comparison</a></li>
                            <li><a href="visualization.php">Visualization</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="login.php">Login</a></li>
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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="statistics.php">Statistics</a></li>
                            <li><a href="comparasion.php">Comparison</a></li>
                            <li><a href="visualization.php">Visualization</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="login.php">Login</a></li>
                        </ul>
                        <div id="menu-close-bar" class="menu-close-bar"> Close</div>
                    </div>
                </div>

                <div class="select-stats">
                    <div class="select-button">
                        <form action="" method="get">
                            <select name="option">
                                <option value="none">Choose statistic</option>
                                <option value="option1">Top 10 Countries with Increasing Obesity</option>
                                <option value="option2">Top 10 Countries with Highest Obesity Risk</option>
                                <option value="option3">Top 10 Countries with Highest Average Pre-Obesity</option>
                                <option value="option4">Countries with Common Overweight Percentage</option>
                            </select>
                            <input class="submit" type="submit" value="Submit">
                        </form>
                    </div>
                </div>

                <div class="results">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        require_once "Model/CountryModel.php";
                        $countryModel = new CountryModel();

                        $option = isset($_GET['option']) ? $_GET['option'] : '';

                        switch ($option) 
                        {
                            case 'option1':
                                echo "<div id='option1' class='result-section'>";
                                $countries = $countryModel->getTop10CountriesWithIncreasingObesity(); 
                                if ($countries) {
                                    echo "<h2>Top 10 Countries with Increasing Obesity</h2>";
                                    echo "<table>";
                                    echo "<tr><th>Country</th><th>Last Year</th><th>Previous Year</th><th>Percentage Difference</th></tr>";
                                    foreach ($countries as $country) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($country['name']) . "</td>";
                                        echo "<td>" . htmlspecialchars($country['last_year']) . "</td>";
                                        echo "<td>" . htmlspecialchars($country['previous_year']) . "</td>";
                                        echo "<td>" . htmlspecialchars($country['percentage_difference']) . "</td>";
                                        echo "</tr>";    
                                    }
                                    echo "</table>";
                                } else {
                                    echo "<p>No data found for the top 10 countries with increasing obesity.</p>";
                                }
                                echo "</div>";
                                break;

                            case 'option2':
                                $maxValue = $countryModel->getMaxValue();
                                echo "<div id='option2' class='result-section'>";
                                if ($maxValue && !empty($maxValue)) {
                                    echo "<h2>Top 10 Countries with Highest Obesity Risk</h2>";
                                    echo "<table>";
                                    echo "<tr><th>Country</th><th>Year</th><th>Overweight (%)</th><th>Pre-Obese (%)</th><th>Obese (%)</th><th>Obesity Risk Score (Score/300%)</th></tr>";
                                    foreach ($maxValue as $row) {
                                        $obesityRiskScore = isset($row['Obesity_Risk_Score']) ? $row['Obesity_Risk_Score'] : 0;
                                        $maxScore = 300;
                                        echo "<tr>";
                                        echo "<td>" . (isset($row['country_name']) ? htmlspecialchars($row['country_name']) : '') . "</td>";
                                        echo "<td>" . (isset($row['year']) ? htmlspecialchars($row['year']) : '') . "</td>";
                                        echo "<td>" . (isset($row['Overweight']) ? htmlspecialchars($row['Overweight']) : '') . "</td>";
                                        echo "<td>" . (isset($row['Pre_Obese']) ? htmlspecialchars($row['Pre_Obese']) : '') . "</td>";
                                        echo "<td>" . (isset($row['Obese']) ? htmlspecialchars($row['Obese']) : '') . "</td>";                                            echo "<td>" . htmlspecialchars($obesityRiskScore) . " / " . htmlspecialchars($maxScore) . "%</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "<div class='no-data-message'>";
                                    echo "<p>No data found for the maximum value.</p>";
                                    echo "</div>";

                                }
                                echo "</div>";
                                break;                                                                                               
                                
                            case 'option3':
                                    $topCountries = $countryModel->getTop10CountriesHighestAveragePreObesity();
                                    echo "<div id='top10_highest_pre_obesity_average' class='result-section'>";
                                    if ($topCountries) {
                                        echo "<h2>Top 10 Countries with Highest Average Pre-Obesity Percentage</h2>";
                                        echo "<table>";
                                        echo "<tr><th>Country</th><th>2008</th><th>2014</th><th>2017</th><th>2019</th><th>2022</th><th>Average Percentage</th></tr>";
                                        foreach ($topCountries as $country) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($country['country_name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($country['year_2008']) . "</td>";
                                            echo "<td>" . htmlspecialchars($country['year_2014']) . "</td>";
                                            echo "<td>" . htmlspecialchars($country['year_2017']) . "</td>";
                                            echo "<td>" . htmlspecialchars($country['year_2019']) . "</td>";
                                            echo "<td>" . htmlspecialchars($country['year_2022']) . "</td>";
                                            echo "<td>" . number_format($country['average_percentage'], 2) . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        echo "<p>No data found for the top 10 countries with highest average pre-obesity percentage.</p>";
                                    }
                                    echo "</div>";
                                    break;
                                    

                            case 'option4':
                                    $sameValue = $countryModel->getSameValue();
                                    echo "<div id='option4' class='result-section'>";
                                    if ($sameValue && !empty($sameValue)) {
                                        echo "<h2>Same Value</h2>";
                                        echo "<table>";
                                        echo "<tr><th>Year</th><th>Percentage</th><th>Countries</th></tr>";
                                        foreach ($sameValue as $value) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($value['year']) . "</td>";
                                            echo "<td>" . htmlspecialchars($value['percentage']) . "</td>";
                                            echo "<td>" . htmlspecialchars($value['countries']) . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        echo "<p>Nu s-au găsit date pentru aceleași valori.</p>";
                                    }
                                    echo "</div>";
                                    break;
                                
                            default:
                            echo "<div class='no-data-message'>";
                            echo "<p> Please select a statistic to visualize. </p>";
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
    <script type="text/javascript">
    
    const sections = document.querySelectorAll('.result-section');
    const selectedSection = document.getElementById(sectionId);

    document.addEventListener('DOMContentLoaded', function() {
    // afisare sectiune default la inceput
    showSection('option1');

    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        //event.preventDefault(); // previne comportamentul implicit al formularului

        // obtin val selectata
        const selectElement = document.querySelector('select');
        const selectedOption = selectElement.value;

        switch (selectedOption) {
            case 'option1':
                showSection('option1');
                break;
            case 'option2':
                showSection('option2');
                break;
            case 'option3':
                showSection('option3');
                break;
            case 'option4':
                showSection('option4');
                break;
            default:
                console.log('Opțiune invalidă');
        }
    });

    function showSection(sectionId) {
        const sections = document.querySelectorAll('.result-section');

        sections.forEach(section => {
            if (section.id === sectionId) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        });
    }

    // responsive-menu
    const menuCloseButton = document.getElementById('menu-close-bar');
    if (menuCloseButton) {
        menuCloseButton.addEventListener('click', function() {
            document.getElementById('responsive-menu').style.display = 'none';
        });
    }

    const menuBarButton = document.getElementById('responsive-menu-bar');
    if (menuBarButton) {
        menuBarButton.addEventListener('click', function() {
            toggleResponsiveMenu();
        });
    }

    function toggleResponsiveMenu() {
        const responsiveMenu = document.getElementById('responsive-menu');
        if (responsiveMenu.style.display === 'block') {
            responsiveMenu.style.display = 'none';
        } else {
            responsiveMenu.style.display = 'block';
        }
    }
});
</script>
</body>

</html>
