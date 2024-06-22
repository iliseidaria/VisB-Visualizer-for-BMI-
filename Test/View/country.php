<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Country Information</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="container">
            <div class="header">
                <p class="titlu">Country Information</p>
            </div>

            <div class="content">
                <?php
                if (isset($_GET['id']) && isset($_GET['name'])) {
                    $id = htmlspecialchars($_GET['id']);
                    $name = htmlspecialchars($_GET['name']);
                    
                    // Aici poți adăuga codul pentru a prelua informații suplimentare despre țară din baza de date, utilizând ID-ul.
                    echo "<h2>Information for $name</h2>";
                    echo "<p>Country ID: $id</p>";
                    
                    // Exemplu de date afișate (înlocuiește cu date reale din baza de date)
                    echo "<p>Additional information about $name...</p>";
                } else {
                    echo "<p>No country information available.</p>";
                }
                ?>
            </div>

            <div class="footer"></div>
        </div>
    </main>
</body>
</html>
