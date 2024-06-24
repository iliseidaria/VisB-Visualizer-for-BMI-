<!DOCTYPE html>
<html>
<head>
  <title>Geo Chart</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    // verif daca google e definit inainte de sa initiez biblioteca Google Charts
    if (typeof google !== 'undefined') {
      google.charts.load('current', {'packages': ['geochart']});
      google.charts.setOnLoadCallback(drawRegionsMap);
    }

    function drawRegionsMap() {
      var data = google.visualization.arrayToDataTable([
        ['Country', 'Obesity Percentage'],
        <?php
include '../Model/Database.php';

$db = new Database();

// preiau anul si categoria BMI din query string (GET)
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
        $percentage = isset($row['obesity_percentage']) ? $row['obesity_percentage'] : 0; // tratez valorile null
        $rows[] = "['" . $row['country_name'] . "', " . $percentage . "]";
    }
    echo implode(",", $rows);
} else {
    echo "['No data', 0]";
}
?>
      ]);

      var options = {
        chart: {
          title: 'Obesity rate by body mass index (BMI)',
          subtitle: 'Year: <?php echo $year; ?>, Category: <?php echo $bmi_category; ?>',
        },
        region: '150', // codul pt EU
        displayMode: 'regions',
        resolution: 'countries',
        colorAxis: { colors: ['#ff9999', '#00FF00']}, //axa culorilor
        backgroundColor: '#FFFFFF',
        datalessRegionColor: '#F5F5F5',
        defaultColor: '#f5f5f5',
        legend: 'none',
        tooltip: { textStyle: { color: 'blue', fontSize: 16 } },
        
        // zoom -> vizibilitate mai buna pt tarile mai mici
        width: 1200,
        height: 1000
      };

      var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

      chart.draw(data , options);
    }
  </script>
  <style>
    .chart-title {
      font-size: 1em; 
      margin: 1px;
      padding: 1px;
      font-family:sans-serif;
      color:#828282 ;
    }
    .chart-subtitle {
      font-size: 0.9em; 
      margin: 1px;
      padding: 1px;
      font-family:sans-serif;
      color:#b8b8b8;
    }
    .chart-container {
      display: flex;
      align-items: center;
    }
  </style>
</head>
<body>
<div class="chart-title">Obesity Rate by Body Mass Index (BMI)</div>
<div class="chart-subtitle">Year: <?php echo $year; ?></div>
  <div id="regions_div" style="width: 100%; height: 800px;"></div>
</body>
</html>
