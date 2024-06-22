<?php
session_start();
require_once '../Controller/AdminController.php';
$adminController = new AdminController();
$adminController->Login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="statistics.php">Statistics</a></li>
                            <li><a href="comparasion.php">Comparison</a></li>
                            <li><a href="visualization.php">Visualization</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="login.php">Login</a></li>
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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="statistics.php">Statistics</a></li>
                            <li><a href="comparasion.php">Comparison</a></li>
                            <li><a href="visualization.php">Visualization</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="login.php">Login</a></li>
                        </ul>
                        <div id="menu-close-bar" class="menu-close-bar"> Close</div>
                    </div>
                </div>

                <div class="text-stuff">
                    <div class="text-main">
                        <p>This page is dedicated only for the use of the admin. If you are a visitor of this page, you
                            DO NOT have acces to login.
                            Please go to a relevant page.</p>
                    </div>
                </div>
                <div class="login-buttons">
                    <div class="login-container">
                        <h2>Admin Login</h2>
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo '<p class="error">' . $_SESSION['error'] . '</p>';
                            unset($_SESSION['error']); // sterge mesajul de eroare
                        }
                        ?>
                        <form action="/Test/View/login.php" method="POST">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" required>
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                            <input type="submit" value="Login">
                        </form>
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