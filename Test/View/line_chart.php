<?php
include '../Model/Database.php';

$db = new Database();

$bmi_category = isset($_GET['bmi_category']) ? $_GET['bmi_category'] : 'Overweight';

$table = '';
switch ($bmi_category) {
    case 'Overweight':
        $table = 'yearlydata';
        break;
    case 'Pre-obese':
        $table = 'yearly_data_pre_obese';
        break;
    case 'Obese':
        $table = 'yearly_data_obese';
        break;
    default:
        $table = 'yearlydata';
}

// lista de tari din BD
$query_countries = "SELECT DISTINCT c.name AS country_name FROM $table y 
                    JOIN country c ON y.country_id = c.id
                    WHERE y.year = 2008;";
$countries_result = $db->select($query_countries);

// datele din BD pentru fiecare an si tara
$query_data = "SELECT y.year, c.name AS country_name, y.percentage AS obesity_percentage 
               FROM $table y 
               JOIN country c ON y.country_id = c.id
               WHERE y.year >= 2008 AND y.percentage IS NOT NULL AND y.percentage != 0
               ORDER BY y.year, c.name";
$data_result = $db->select($query_data);

// procesarea rezultatelor
$years = [];
$rows = [];

if ($data_result) {
    foreach ($data_result as $row) {
        $year = intval($row['year']);
        $country = $row['country_name'];
        $percentage = floatval($row['obesity_percentage']);

        if (!isset($years[$year])) {
            $years[$year] = [];
        }
        $years[$year][$country] = $percentage;
    }
}

// construim datele pentru grafic sub forma de array JavaScript
$data = "var data = new google.visualization.DataTable();\n";
$data .= "data.addColumn('number', 'Year');\n";

if ($countries_result) {
    foreach ($countries_result as $country) {
        $country_name = $country['country_name'];
        $data .= "data.addColumn('number', '" . $country_name . "');\n";
    }
}

foreach ($years as $year => $countries) {
    $row = [$year];
    foreach ($countries_result as $country) {
        $country_name = $country['country_name'];
        if (isset($countries[$country_name])) {
            $row[] = $countries[$country_name];
        } else {
            $row[] = null; // null pentru info lipsa
        }
    }
    $rows[] = $row;
}

foreach ($rows as $row) {
    $data .= "data.addRow(" . json_encode($row) . ");\n";
}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart', 'line']});
    google.charts.setOnLoadCallback(drawLineChart);

    function drawLineChart() {
        <?php echo $data; ?>

        var options = {
            chart: {
                title: 'Obesity Rate by Country over the Years',
                subtitle: 'Yearly data'
            },
            width: 1600,
            height: 1200,
            chartArea: { width: '80%', height: '70%' },
            hAxis: {
                ticks: [{v: 2008, f: '2008'}, {v: 2014, f: '2014'}, {v: 2017, f: '2017'}, {v: 2019, f: '2019'}, {v: 2022, f: '2022'}],
                format: '####'
            },
            legend: { 
                textStyle: { fontSize: 10 }
            },
            explorer: {
                axis: 'horizontal',
                keepInBounds: true
            }
        };

        var chart = new google.charts.Line(document.createElement('div')); // creăm un element div temporar

        chart.draw(data, google.charts.Line.convertOptions(options));

        document.body.appendChild(chart.container.firstChild); // adăugăm doar graficul în corpul documentului
    }
</script>