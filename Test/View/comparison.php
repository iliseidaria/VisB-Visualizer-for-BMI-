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
                        <form action="" method="post">
                            <select name="option1">
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
                            <select name="option2">
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
                            <select name="option3">
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

                <div class="results">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        require_once "Model/CountryModel.php";

                        $country1 = $_POST['option1'];
                        $country2 = $_POST['option2'];
                        $year = $_POST['option3'];

                        $countryModel = new CountryModel();

                        if ($country1 != 'none' && $country2 != 'none' && $year != 'none') {
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
                        } else {
                            echo "<div id='comparisonResults' class='result-section'>";
                            echo "Please select both countries and a year.";
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
