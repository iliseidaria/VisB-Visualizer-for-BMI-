<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-comparison.css">
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
                            <li><a href="/Test/">Home</a></li>
                            <li><a href="/Test/statistics">Statistics</a></li>
                            <li><a href="/Test/comparison">Comparison</a></li>
                            <li><a href="/Test/visualization">Visualization</a></li>
                            <li><a href="/Test/contact">Contact</a></li>
                            <li><a href="/Test/login">Login</a></li>
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
                            <li><a href="/Test/">Home</a></li>
                            <li><a href="/Test/statistics">Statistics</a></li>
                            <li><a href="/Test/comparison">Comparison</a></li>
                            <li><a href="/Test/visualization">Visualization</a></li>
                            <li><a href="/Test/contact">Contact</a></li>
                            <li><a href="/Test/login">Login</a></li>
                        </ul>
                        <div id="menu-close-bar" class="menu-close-bar"> Close</div>
                    </div>
                </div>

                <div class="text-stuff">
                    <div class="button-bar">
                        <form action="" method="get">
                            <select name="country1">
                                <option value="none">Country 1</option>
                                <option value="Austria">Austria</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="Greece">Greece</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Italy">Italy</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Malta">Malta</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Romania">Romania</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Spain">Spain</option>
                                <option value="Sweden">Sweden</option>
                            </select>
                            <select name="country2">
                                <option value="none">Country 2</option>
                                <option value="Austria">Austria</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="Greece">Greece</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Italy">Italy</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Malta">Malta</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Romania">Romania</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Spain">Spain</option>
                                <option value="Sweden">Sweden</option>
                            </select>
                            <select name="year">
                                <option value="none">Year</option>
                                <option value="2008">2008</option>
                                <option value="2014">2014</option>
                                <option value="2017">2017</option>
                                <option value="2019">2019</option>
                                <option value="2022">2022</option>
                            </select>

                            <input class="submit" type="submit" value="Submit">
                        </form>
                    </div>
                </div>

                <div class="button-container">
                    <button id="comparisonButton">1v1 Comparison</button>
                    <button id="maxValueButton">Max Value</button>
                    <button id="minValueButton">Min Value</button>
                    <button id="sameValueButton">Same Value</button>
                </div>

                <div class="results">
                    <?php
                    $country1 = null;
                    $country2 = null;
                    $country3 = null;

                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        require_once __DIR__ . '/../Model/CountryModel.php';

                        $country1 = isset($_GET['country1']) ? $_GET['country1'] : null;
                        $country2 = isset($_GET['country2']) ? $_GET['country2'] : null;
                        $year = isset($_GET['year']) ? $_GET['year'] : null;

                        $countryModel = new CountryModel();
                        $showError = false;

                        if (
                            ($country1 != null && $country2 == null && $year == null) || ($country1 == null && $country2 != null && $year == null) || ($country1 == null && $country2 == null && $year != null)
                            || ($country1 != null && $country2 != null && $year == null) || ($country1 == null && $country2 != null && $year != null) || ($country1 != null && $country2 == null && $year != null)
                        ) {
                            $showError = true;
                        }

                        if ($country1 != null && $country2 != null && $year != null) {
                            $data = $countryModel->getCountryData($country1, $country2, $year);


                            echo "<div id='comparisonResults' class='result-section'>";
                            echo "<h2>Results for $year</h2>";
                            echo "<table>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Country</th>";
                            echo "<th>Year</th>";
                            echo "<th>Percentage</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            foreach ($data as $row) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                                echo "<td>" . (isset($row['percentage']) ? htmlspecialchars($row['percentage']) : 'Missing data') . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";

                        }
                        if ($showError == true) {
                            echo "<div id='comparisonResults' class='result-section'>";
                            echo "Please select both countries and a year.";
                            echo "</div>";
                        }

                        // Max Value Section
                        echo "<div id='maxValueResults' class='result-section'>";
                        $maxValue = $countryModel->getMaxValue();
                        if ($maxValue) {
                            echo "<h2>Max Value</h2>";
                            echo "<p>Country: " . htmlspecialchars($maxValue[0]['name']) . ", Year: " . htmlspecialchars($maxValue[0]['year']) . ", Maximum value: " . htmlspecialchars($maxValue[0]['percentage']) . "</p>";
                        } else {
                            echo "<p>Nu s-au găsit date pentru valoarea maximă.</p>";
                        }
                        echo "</div>";

                        // Min Value Section
                        echo "<div id='minValueResults' class='result-section'>";
                        $minValue = $countryModel->getMinValue();
                        if ($minValue) {
                            echo "<h2>Min Value</h2>";
                            echo "<p>Country: " . htmlspecialchars($minValue[0]['name']) . ", Year: " . htmlspecialchars($minValue[0]['year']) . ", Minimum value: " . htmlspecialchars($minValue[0]['percentage']) . "</p>";
                        } else {
                            echo "<p>Nu s-au găsit date pentru valoarea minimă.</p>";
                        }
                        echo "</div>";

                        // Same Value Section
                        echo "<div id='sameValueResults' class='result-section'>";
                        $sameValue = $countryModel->getSameValue();
                        if ($sameValue) {
                            echo "<h2>Same Value</h2>";
                            foreach ($sameValue as $value) {
                                echo "<p>Year: " . htmlspecialchars($value['year']) . " -- Value: " . htmlspecialchars($value['percentage']) . "</p>";
                                echo "\n";
                            }
                        } else {
                            echo "<p>Nu s-au găsit date pentru aceleași valori.</p>";
                        }
                        echo "</div>";
                    }
                    ?>
                </div>

                <div class="export">
                    <div class="export-text">
                        <p>Export as:</p>
                    </div>
                    <div class="action-buttons">
                        <button id="csvButton" type="button">CSV</button>
                        <button id="webpButton" type="button">WebP</button>
                        <button id="svgButton" type="button">SVG</button>
                    </div>
                </div>
                <script>
                    document.getElementById('csvButton').addEventListener('click', function () {
                        alert('CSV export started');
                        sendRequest('csv');
                    });

                    document.getElementById('webpButton').addEventListener('click', function () {
                        alert('WebP export started');
                        sendRequest('webp');
                    });

                    document.getElementById('svgButton').addEventListener('click', function () {
                        alert('SVG export started');
                        sendRequest('svg');
                    });

                    function sendRequest(format) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'ExportController.php?format=' + format, true);
                        xhr.responseType = 'blob'; // Ensure the response is treated as a binary file
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4) {
                                if (xhr.status == 200) {
                                    var link = document.createElement('a');
                                    link.href = window.URL.createObjectURL(xhr.response);
                                    link.download = 'data.' + format;
                                    document.body.appendChild(link); // Required for FF
                                    link.click();
                                    document.body.removeChild(link); // Clean up
                                    alert('Export successful!');
                                } else {
                                    alert('Export failed! Status: ' + xhr.status);
                                }
                            }
                        };
                        xhr.send();
                    }
                </script>




                <div class="footer"></div>
            </div>

            <footer></footer>
        </div>
    </main>

    <script type='text/javascript'>
        function showSection(sectionId) {
            // Ascunde toate secțiunile
            const sections = document.querySelectorAll('.result-section');
            sections.forEach(section => section.style.display = 'none');

            // Afișează secțiunea selectată
            const selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.style.display = 'block';
            }
        }

        document.getElementById('comparisonButton').addEventListener('click', function () {
            showSection('comparisonResults');
        });

        document.getElementById('maxValueButton').addEventListener('click', function () {
            showSection('maxValueResults');
        });

        document.getElementById('minValueButton').addEventListener('click', function () {
            showSection('minValueResults');
        });

        document.getElementById('sameValueButton').addEventListener('click', function () {
            showSection('sameValueResults');
        });

        // Inițializează pagina pentru a afișa doar secțiunea de comparare la început
        window.addEventListener('load', function () {
            showSection('comparisonResults');
        });
    </script>
</body>

</html>