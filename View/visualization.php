<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style-visualization.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisB</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
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

                <div class="buttons-vis">
                    <button id="BarChartButton" onclick="showForm('barChartForm')">Bar Chart</button>
                    <button id="GeoChartButton" onclick="showForm('geoChartForm')">Geo Chart</button>
                    <button id="LineChartButton" onclick="showForm('lineChartForm')">Line Chart</button>
                </div>

                <!-- Formular Bar Chart -->
                <form id="barChartForm" class="chart-form" style="display: block;" method="GET" action="View/bar_chart.php" target="chartFrame">
                    <label for="barYearSelect">Select year and BMI category for Bar Chart:</label>
                    <select id="barYearSelect" name="year">
                        <option value="2008">2008</option>
                        <option value="2014">2014</option>
                        <option value="2017">2017</option>
                        <option value="2019">2019</option>
                        <option value="2022">2022</option>
                    </select>
                    <select id="barBmiCategorySelect" name="bmi_category">
                        <option value="Overweight">Overweight</option>
                        <option value="Pre-obese">Pre-obese</option>
                        <option value="Obese">Obese</option>                
                    </select>
                    <button type="submit">Submit</button>
                </form>

                <!-- Formular Geo Chart -->
                <form id="geoChartForm" class="chart-form" style="display: none;" method="GET" action="View/geo_chart.php" target="chartFrame">
                    <label for="geoYearSelect">Select year and BMI category for Geo Chart:</label>
                    <select id="geoYearSelect" name="year">
                        <option value="2008">2008</option>
                        <option value="2014">2014</option>
                        <option value="2017">2017</option>
                        <option value="2019">2019</option>
                        <option value="2022">2022</option>
                    </select>
                    <select id="geoBmiCategorySelect" name="bmi_category">
                        <option value="Overweight">Overweight</option>
                        <option value="Pre-obese">Pre-obese</option>
                        <option value="Obese">Obese</option>                
                    </select>
                    <button type="submit">Submit</button>
                </form>

                <!-- Formular Line Chart -->
                <form id="lineChartForm" class="chart-form" style="display: none;" method="GET" action="View/line_chart.php" target="chartFrame">
                    <label for="lineBmiCategorySelect">Select BMI category for Line Chart:</label>
                    <select id="lineBmiCategorySelect" name="bmi_category">
                        <option value="Overweight">Overweight</option>
                        <option value="Pre-obese">Pre-obese</option>
                        <option value="Obese">Obese</option>                
                    </select>
                    <button type="submit">Submit</button>
                </form>

                <div class="results">
                    <iframe id="chartFrame" name="chartFrame" src="View/bar_chart.php" style="width: 100%; height: 800px; border: none;"></iframe>
                </div>
                
                <div class="export">
                    <p class="export-text">Export as:</p>
                    <div class="action-buttons">
                        <button type="button">CSV</button>
                        <button type="button">WebP</button>
                        <button type="button">SVG</button>
                    </div>
                </div>
            </div>

            <footer>

            </footer>
        </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var responsiveMenuBar = document.getElementById('responsive-menu-bar');
        var responsiveMenu = document.getElementById('responsive-menu');
        var menuCloseBar = document.getElementById('menu-close-bar');

        // toggle responsive menu
        responsiveMenuBar.addEventListener('click', function() {
            responsiveMenu.style.display = (responsiveMenu.style.display === 'block') ? 'block' : 'block';
        });

        // close menu
        menuCloseBar.addEventListener('click', function() {
            responsiveMenu.style.display = 'none';
        });

        //  actualizarea iframe-ului si afisare formular corespunzator
        function updateChart(chartType) {
            var chartForm, chartFrame;
            
            // verific tipul de chart
            if (chartType === 'Bar Chart') {
                document.getElementById('barChartForm').style.display = 'block';
                document.getElementById('geoChartForm').style.display = 'none';
                document.getElementById('lineChartForm').style.display = 'none';
            } else if (chartType === 'Geo Chart') {
                document.getElementById('barChartForm').style.display = 'none';
                document.getElementById('geoChartForm').style.display = 'block';
                document.getElementById('lineChartForm').style.display = 'none';
            } else if (chartType === 'Line Chart') {
                document.getElementById('barChartForm').style.display = 'none';
                document.getElementById('geoChartForm').style.display = 'none';
                document.getElementById('lineChartForm').style.display = 'block';
            }

            responsiveMenu.style.display = 'none';
        }

        document.getElementById('BarChartButton').addEventListener('click', function() {
            var year = document.getElementById('barYearSelect').value;
            var bmiCategory = document.getElementById('barBmiCategorySelect').value;
            updateChart('Bar Chart');
            updateChartWithGetParams('View/bar_chart.php', year, bmiCategory);
        });

        document.getElementById('GeoChartButton').addEventListener('click', function() {
            var year = document.getElementById('geoYearSelect').value;
            var bmiCategory = document.getElementById('geoBmiCategorySelect').value;
            updateChart('Geo Chart');
            updateChartWithGetParams('View/geo_chart.php', year, bmiCategory);
        });

        document.getElementById('LineChartButton').addEventListener('click', function() {
            var bmiCategory = document.getElementById('lineBmiCategorySelect').value;
            updateChart('Line Chart');
            updateChartWithGetParams('View/line_chart.php', null, bmiCategory);
        });

        // fct actualizare iframe-ul cu parametrii GET
        function updateChartWithGetParams(url, year, bmiCategory) {
            var queryParams = [];

            if (year !== null) {
                queryParams.push('year=' + encodeURIComponent(year));
            }

            if (bmiCategory !== null) {
                queryParams.push('bmi_category=' + encodeURIComponent(bmiCategory));
            }

            var queryString = queryParams.join('&');
            var iframeSrc = url + '?' + queryString;
            document.getElementById('chartFrame').src = iframeSrc;
        }

    });
</script>

</body>
</html>
