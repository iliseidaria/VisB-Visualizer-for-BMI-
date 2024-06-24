<?php
require_once __DIR__ . '/../Model/CountryModel.php';

$countryModel = new CountryModel();
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
                            <li><a href="/Test/admin_home">Main Page</a></li>
                            <li><a href="/Test/visualize_Data">Visualize Data</a></li>
                            <li><a href="/Test/modify_Data">Modify Data</a></li>
                            <li><a href="/Test/">Logout</a></li>
                        </ul>
                    </nav>
                </div>
                <div id="responsive-menu-container" class="responsive-menu-container">
                    <div id="responsive-menu-bar" class="responsive-menu-bar">
                        <span>Menu</span>
                    </div>
                    <div id="responsive-menu">
                        <ul id="primary-menu">
                            <li><a href="/Test/admin_home">Main Page</a></li>
                            <li><a href="/Test/visualize_Data">Visualize Data</a></li>
                            <li><a href="/Test/modify_Data">Modify Data</a></li>
                            <li><a href="/Test/">Logout</a></li>
                        </ul>
                        <div id="menu-close-bar" class="menu-close-bar"> Close</div>
                    </div>
                </div>


                <div class="text-stuff results">
                    <div class="text-main">
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
                                <?php foreach ($data as $row): ?>
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
                </div>
            </div>
            <footer>
            </footer>
        </div>
    </main>
    <script type='text/javascript' src='main.js'></script>
</body>

</html>