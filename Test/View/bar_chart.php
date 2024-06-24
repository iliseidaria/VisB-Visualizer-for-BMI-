<?php
include '../Model/Database.php';

$db = new Database();

// preluăm parametrii din query string (GET)
$year = isset($_GET['year']) ? intval($_GET['year']) : 2008;
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

$query = "SELECT c.name AS country_name, y.percentage AS obesity_percentage 
          FROM $table y 
          JOIN country c ON y.country_id = c.id
          WHERE y.year = $year;";
$result = $db->select($query);

if ($result) {
    $rows = [];
    foreach ($result as $row) {
        $percentage = isset($row['obesity_percentage']) ? $row['obesity_percentage'] : 0; // tratăm valorile null
        $rows[] = "['" . $row['country_name'] . "', " . $percentage . "]";
    }
    $data = implode(",", $rows);
} else {
    $data = "[['No data', 0]]";
}

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Country', 'Obesity Percentage'],
            <?php echo $data; ?>
        ]);

        var options = {
            chart: {
                title: 'Obesity Rate by Body Mass Index (BMI)',
                subtitle: 'Year: <?php echo $year; ?>, Category: <?php echo $bmi_category; ?>',
            },
            bars: 'horizontal',
            legend: { position: 'top', maxLines: 2 },
            colors: ['#3366CC'],
            bar: { groupWidth: '85%' }, //spatiu intre bare
            hAxis: {
                ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100], // marcaj pt Ox (intervale de 10)
            }
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<div id="barchart_material" style="width: 100%; height: 800px;"></div>
