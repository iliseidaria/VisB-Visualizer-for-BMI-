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

                <div class="text-stuff">
                    <div class="text-main">
                        <form method="POST">
                            <input type="hidden" name="action" value="create">
                            <label for="table-select">Select the table:</label>
                            <select id="table-select" name="table" required>
                                <option value="yearlydata">Overweight Data</option>
                                <option value="yearly_data_obese">Obese Data</option>
                                <option value="yearly_data_pre_obese">Pre Obese Data</option>
                            </select><br>
                            <label for="id_country-create">Select the ID of the country:</label>
                            <select id="id_country-create" name="country_id" required>
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
                        <?php if (isset($create_message)): ?>
                            <p><?php echo $create_message; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="text-main">
                        <form method="POST">
                            <input type="hidden" name="action" value="update">
                            <label for="table-select">Select the table:</label>
                            <select id="table-select" name="table" required>
                                <option value="yearlydata">Overweight Data</option>
                                <option value="yearly_data_obese">Obese Data</option>
                                <option value="yearly_data_pre_obese">Pre Obese Data</option>
                            </select><br>
                            <label for="id_country-update">Select the ID of the country:</label>
                            <select id="id_country-update" name="country_id" required>
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
                        <?php if (isset($update_message)): ?>
                            <p><?php echo $update_message; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="text-main">
                        <form method="POST">
                            <input type="hidden" name="action" value="delete">
                            <label for="table-select">Select the table:</label>
                            <select id="table-select" name="table" required>
                                <option value="yearlydata">Overweight Data</option>
                                <option value="yearly_data_obese">Obese Data</option>
                                <option value="yearly_data_pre_obese">Pre Obese Data</option>
                            </select><br>
                            <label for="id_country-delete">Enter the ID of the country you want to delete:</label>
                            <input type="text" id="id_country-delete" name="country_id" required><br>
                            <label for="year-delete">Enter the year:</label>
                            <input type="number" id="year-delete" name="year" required><br>
                            <span id="year-error-delete"></span><br>
                            <input type="submit" value="Delete">
                            <div id="delete-result"></div>
                        </form>
                        <?php if (isset($delete_message)): ?>
                            <p><?php echo $delete_message; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <footer>
            </footer>
        </div>
    </main>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST['action'];
        $country_id = $_POST['country_id'];
        $year = $_POST['year'];
        $percentage = $_POST['percentage'];
        $table = $_POST['table'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "eurostat_data";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($action == 'create') {
            $sql = "INSERT INTO $table (country_id, year, percentage)
                    VALUES ('$country_id', '$year', '$percentage')";
            if ($conn->query($sql) === TRUE) {
                $create_message = "Record added successfully";
            } else {
                $create_message = "Error adding record: " . $conn->error;
            }
        } elseif ($action == 'update') {
            $sql = "UPDATE $table SET percentage='$percentage' WHERE country_id='$country_id' AND year='$year'";
            if ($conn->query($sql) === TRUE) {
                $update_message = "Record updated successfully";
            } else {
                $update_message = "Error updating record: " . $conn->error;
            }
        } elseif ($action == 'delete') {
            $sql = "DELETE FROM $table WHERE country_id='$country_id' AND year='$year'";
            if ($conn->query($sql) === TRUE) {
                $delete_message = "Record deleted successfully";
            } else {
                $delete_message = "Error deleting record: " . $conn->error;
            }
        }

        $conn->close();
    }
    ?>
</body>

</html>