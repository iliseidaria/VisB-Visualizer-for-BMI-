<?php
require_once __DIR__ . '/../Model/CountryModel.php';

$countryModel = new CountryModel();

function exportCSV($data) {
    $filename = "export.csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'Country', 'Year', 'Percentage'));

    foreach ($data as $row) {
        fputcsv($output, $row);
    }
    fclose($output);
    exit;
}


function exportWebP($data) {
    $width = 600;
    $height = 400;
    $image = imagecreatetruecolor($width, $height);

    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
    $blue = imagecolorallocate($image, 0, 0, 255);

    imagefilledrectangle($image, 0, 0, $width, $height, $white);

    $max_value = 0;
    foreach ($data as $row) {
        if ($row['percentage'] > $max_value) {
            $max_value = $row['percentage'];
        }
    }

    $bar_width = $width / count($data);
    $x = 0;
    foreach ($data as $row) {
        $bar_height = ($row['percentage'] / $max_value) * $height;
        imagefilledrectangle($image, $x, $height - $bar_height, $x + $bar_width - 1, $height - 1, $blue);
        $x += $bar_width;
    }

    $filename = "export.webp";
    imagewebp($image, $filename);

    imagedestroy($image);

    header('Content-Type: image/webp');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($filename);

    exit;
}




function exportSVG($data) {
    $svg = '<?xml version="1.0" standalone="no"?>
            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN"
            "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
            <svg width="800" height="600" xmlns="http://www.w3.org/2000/svg" version="1.1">';

    $max_value = 0;
    foreach ($data as $row) {
        if ($row['percentage'] > $max_value) {
            $max_value = $row['percentage'];
        }
    }

    $bar_width = 50;
    $x = 50;
    foreach ($data as $row) {
        $bar_height = ($row['percentage'] / $max_value) * 500;
        $svg .= '<rect x="' . $x . '" y="' . (550 - $bar_height) . '" width="' . $bar_width . '" height="' . $bar_height . '" fill="blue"/>';
        $svg .= '<text x="' . ($x + $bar_width / 2) . '" y="580" font-family="Arial" font-size="14" fill="black" text-anchor="middle">' . $row['name'] . '</text>';
        $x += 100;
    }

    $svg .= '</svg>';

    $filename = "export.svg";
    file_put_contents($filename, $svg);

    header('Content-Type: image/svg+xml');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($filename);

    exit;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['export_csv'])) {
        $table = $_POST['table'];
        switch ($table) {
            case 'yearlydata':
                $data = $countryModel->getAllData();
                break;
            case 'yearly_data_obese':
                $data = $countryModel->getObeseData();
                break;
            case 'yearly_data_pre_obese':
                $data = $countryModel->getPreObeseData();
                break;
            default:
                $data = [];
                break;
        }
        exportCSV($data);
    } elseif (isset($_POST['export_webp'])) {
        $table = $_POST['table'];
        switch ($table) {
            case 'yearlydata':
                $data = $countryModel->getAllData();
                break;
            case 'yearly_data_obese':
                $data = $countryModel->getObeseData();
                break;
            case 'yearly_data_pre_obese':
                $data = $countryModel->getPreObeseData();
                break;
            default:
                $data = [];
                break;
        }
        exportWebP($data);
    } elseif (isset($_POST['export_svg'])) {
        $table = $_POST['table'];
        switch ($table) {
            case 'yearlydata':
                $data = $countryModel->getAllData();
                break;
            case 'yearly_data_obese':
                $data = $countryModel->getObeseData();
                break;
            case 'yearly_data_pre_obese':
                $data = $countryModel->getPreObeseData();
                break;
            default:
                $data = [];
                break;
        }
        exportSVG($data);
    }
}

$data = $countryModel->getAllData(); 
?>

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
                            <li><a href="/VisB-Visualizer-for-BMI/admin_home">Main Page</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/visualize_Data">Visualize Data</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/modify_Data">Modify Data</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/">Logout</a></li>
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
                            <li><a href="/VisB-Visualizer-for-BMI/admin_home">Main Page</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/visualize_Data">Visualize Data</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/modify_Data">Modify Data</a></li>
                            <li><a href="/VisB-Visualizer-for-BMI/">Logout</a></li>
                        </ul>
                        <div id="menu-close-bar" class="menu-close-bar"> Close</div>
                    </div>
                </div>

                <div class="text-stuff results">
                    <div class="text-main">
                        <p>The default database is Overweight Percentage.</p>
                        <br>
                        <form id="table-select-form" action="" method="POST">
                            <label for="table-select">Select the table:</label>
                            <select id="table-select" name="table" required>
                                <option value="yearlydata">Overweight Data</option>
                                <option value="yearly_data_obese">Obese Data</option>
                                <option value="yearly_data_pre_obese">Pre Obese Data</option>
                            </select>
                            <input type="submit" name="show_data" value="Show Data">
                            <input type="submit" name="export_csv" value="Export as CSV">
                            <input type="submit" name="export_webp" value="Export as WebP">
                            <input type="submit" name="export_svg" value="Export as SVG">
                        </form>
                        <br><br>

                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Country</th>
                                    <th>Year</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['show_data'])) {
                                    $table = $_POST['table'];
                                    switch ($table) {
                                        case 'yearlydata':
                                            $data = $countryModel->getAllData();
                                            break;
                                        case 'yearly_data_obese':
                                            $data = $countryModel->getObeseData();
                                            break;
                                        case 'yearly_data_pre_obese':
                                            $data = $countryModel->getPreObeseData();
                                            break;
                                        default:
                                            $data = [];
                                            break;
                                    }
                                } else {
                                    $data = $countryModel->getAllData(); 
                                }

                                foreach ($data as $row): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['year']); ?></td>
                                        <td class="<?php echo isset($row['percentage']) ? '' : 'no-data'; ?>">
                                            <?php echo isset($row['percentage']) ? htmlspecialchars($row['percentage']) : 'Missing data'; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="export">
                        <div class="export-text">
                            <p>Export as:</p>
                        </div>
                        <div class="action-buttons">
                            <button id="csvButton" type="button">CSV</button>
                            <button id="webpButton" type="button">WebP</button>
                            <button id="svgButton" type="button">SVG</button>
                        </div>
                    </div> -->
                </div>
            </div>
            <footer>
            </footer>
        </div>
    </main>
    <script type="text/javascript">
        document.getElementById('csvButton').addEventListener('click', function() {
            var table = document.querySelector('.text-main table');
            var rows = table.querySelectorAll('tr');
            var csv = [];
            for (var i = 0; i < rows.length; i++) {
                var row = [], cols = rows[i].querySelectorAll('td, th');
                for (var j = 0; j < cols.length; j++) {
                    row.push(cols[j].innerText);
                }
                csv.push(row.join(','));
            }
            downloadCSV(csv.join('\n'));
        });

        document.getElementById('webpButton').addEventListener('click', function() {
            alert('Export as WebP button clicked!');
        });

        document.getElementById('svgButton').addEventListener('click', function() {
            alert('Export as SVG button clicked!');
        });

        function downloadCSV(csv) {
            var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            var url = URL.createObjectURL(blob);
            var link = document.createElement("a");
            link.href = url;
            link.setAttribute("download", "data.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
</body>

</html>
