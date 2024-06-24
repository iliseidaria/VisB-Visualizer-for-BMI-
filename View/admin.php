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

                <div class="partition1">
                    <p class="description1">Welcome to the Admin Page. Here, you have the ability to manage and oversee
                        all the data related to the Body Mass Index (BMI). This page provides you with powerful tools to
                        visualize and modify the data as needed.</p>
                    <p class="description2">By clicking on the 'Visualize Data' button, you can view the entire
                        database. This feature allows you to monitor the data in real-time and make informed decisions
                        based on the latest information. The data is presented in an easy-to-understand format, making
                        it simple to interpret and analyze.</p>
                    <p class="description2">The 'Modify Data' button allows you to perform CRUD (Create, Read, Update,
                        Delete) operations on the data. This feature gives you full control over the data, enabling you
                        to add new entries, update existing ones, or remove any unnecessary or outdated information.
                        Please handle these operations with care as they directly impact the database.</p>
                    <p class="description2">If you arrived on this page by accident, or if you have been allowed access
                        by mistake, please contact us
                        immediately at <b>danca.gabriel@outlook.com</b> or <b>iliseidaria@yahoo.com</b>. We take data
                        security and privacy very seriously and will investigate any unauthorized access to our systems.
                    </p>
                </div>

                <section
                    style="margin: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; max-width: 500px; margin: auto;">
                    <form action="" method="post" enctype="multipart/form-data"
                        style="display: flex; flex-direction: column; align-items: center;">
                        <label for="fileToUpload" style="margin-bottom: 10px; font-weight: bold;">Choose a CSV file to
                            upload:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload"
                            style="margin-bottom: 15px; padding: 5px; border-radius: 5px; border: 1px solid #ccc;">
                        <input type="submit" value="Upload File" name="submit"
                            style="padding: 10px 20px; border: none; border-radius: 5px; background-color: #4CAF50; color: white; font-weight: bold; cursor: pointer;">
                    </form>
                </section>


                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if ($fileType != "csv") {
                        echo "Sorry, only CSV files are allowed.";
                        $uploadOk = 0;
                    }

                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

                            if (($handle = fopen($target_file, "r")) !== FALSE) {
                                $dsn = 'mysql:host=localhost;dbname=eurostat_data';
                                $username = 'root';
                                $password = '';

                                try {
                                    $db = new PDO($dsn, $username, $password);
                                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                        $country_id = $data[0];
                                        $year = $data[1];
                                        $percentage = $data[2];

                                        $query = "INSERT INTO yearlyData (country_id, year, percentage) VALUES (?, ?, ?)";
                                        $stmt = $db->prepare($query);
                                        $stmt->execute([$country_id, $year, $percentage]);
                                    }
                                    fclose($handle);
                                    echo "Data has been imported successfully.";
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                            }
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
                ?>

            </div>
            <br>
    </main>

    <script type='text/javascript' src='main.js'></script>
</body>

</html>