<?php 
include "../Model/DataBase.php"; 

// Creăm o instanță a clasei Database
$db = new Database();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bar Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
            color: #333;
        }

        #barChart {
            width: 100%;
            height: 500px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>Yearly Data Bar Chart</h1>
    <canvas id="barChart"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('barChart').getContext('2d');
            var barChartData = {
                labels: [],
                datasets: [{
                    label: 'Percentage',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: []
                }]
            };

            <?php
            // Executăm interogarea
            $query = "SELECT * FROM yearlyData";
            $results = $db->select($query);

            if ($results) {
                foreach ($results as $row) {
                    $id = $row['countr_id'];
                    $percentage = $row['percentage'];
                    $year = $row['year'];
                    echo "barChartData.labels.push('$id ($year)');";
                    echo "barChartData.datasets[0].data.push($percentage);";
                }
            }
            ?>

            var barChart = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Yearly Data'
                    },
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
