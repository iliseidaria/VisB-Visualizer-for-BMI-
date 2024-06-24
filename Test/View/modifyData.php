<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
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
                        <div id="menu-close-bar" class="menu-close-bar">Close</div>
                    </div>
                </div>

                <div class="text-stuff">
                    <div class="text-main">
                        <form id="create-form" method="POST" action="ModifyDataController.php?action=create">
                            <input type="hidden" name="action" value="create">
                            <label for="id_country-create">Select the ID of the country:</label>
                            <select id="id_country-create" name="id_country" required>
                                <?php for ($i = 1; $i <= 35; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select><br>
                            <label for="year-create">Enter the year:</label>
                            <input type="number" id="year-create" name="year" required><br>
                            <span id="year-error-create"></span><br>
                            <label for="percentage-create">Enter the percentage:</label>
                            <input type="number" id="percentage-create" name="percentage" required><br>
                            <span id="percentage-error-create"></span><br>
                            <input type="submit" value="Add">
                            <div id="create-result"></div>
                        </form>
                    </div>
                    <div class="text-main">
                        <form id="update-form" method="POST" action="ModifyDataController.php?action=update">
                            <input type="hidden" name="action" value="update">
                            <label for="id_country-update">Select the ID of the country:</label>
                            <select id="id_country-update" name="id_country" required>
                                <?php for ($i = 1; $i <= 35; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select><br>
                            <label for="year-update">Enter the year:</label>
                            <input type="number" id="year-update" name="year" required><br>
                            <span id="year-error-update"></span><br>
                            <label for="percentage-update">Enter the new percentage:</label>
                            <input type="number" id="percentage-update" name="percentage" required><br>
                            <span id="percentage-error-update"></span><br>
                            <input type="submit" value="Edit">
                            <div id="update-result"></div>
                        </form>

                        <form id="delete-form" method="POST" action="ModifyDataController.php?action=delete">
                            <input type="hidden" name="action" value="delete">
                            <label for="id_country-delete">Enter the ID of the country you want to delete:</label>
                            <input type="text" id="id_country-delete" name="id_country" required><br>
                            <label for="year-delete">Enter the year:</label>
                            <input type="number" id="year-delete" name="year" required><br>
                            <span id="year-error-delete"></span><br>
                            <input type="submit" value="Delete">
                            <div id="delete-result"></div>
                        </form>
                    </div>
                </div>
            </div>

            <footer>
            </footer>
        </div>
    </main>

</body>

</html>

<?php
// Incepe logica PHP pentru baza de date
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../Model/DataBase.php';
    require_once __DIR__ . '/../Model/CountryModel.php';

    $db = new Database();
    $model = new CountryModel();

    switch ($_POST['action']) {
        case 'create':
            $country_id = $_POST['id_country'];
            $year = $_POST['year'];
            $percentage = $_POST['percentage'];
            $sql = "INSERT INTO yearlyData (country_id, year, percentage) VALUES (?, ?, ?)";
            $params = [$country_id, $year, $percentage];
            $stmt = $db->prepare($sql);
            if ($stmt->execute($params)) {
                echo "Data successfully added!";
            } else {
                echo "Failed to add data. Please try again.";
            }
            break;
        case 'update':
            $country_id = $_POST['id_country'];
            $year = $_POST['year'];
            $percentage = $_POST['percentage'];
            $sql = "UPDATE yearlyData SET percentage = ? WHERE country_id = ? AND year = ?";
            $params = [$percentage, $country_id, $year];
            $stmt = $db->prepare($sql);
            if ($stmt->execute($params)) {
                echo "Data successfully updated!";
            } else {
                echo "Failed to update data. Please try again.";
            }
            break;
        case 'delete':
            $country_id = $_POST['id_country'];
            $year = $_POST['year'];
            $sql = "DELETE FROM yearlyData WHERE country_id = ? AND year = ?";
            $params = [$country_id, $year];
            $stmt = $db->prepare($sql);
            if ($stmt->execute($params)) {
                echo "Data successfully deleted!";
            } else {
                echo "Failed to delete data. Please try again.";
            }
            break;
        default:
            echo "Invalid action";
            break;
    }
}
?>