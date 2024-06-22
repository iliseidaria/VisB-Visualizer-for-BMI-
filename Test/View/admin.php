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
                            <li><a href="index.php">Logout</a></li>
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
                            
                            <li><a href="index.php">Logout</a></li>
                        </ul>
                        <div id="menu-close-bar" class="menu-close-bar"> Close</div>
                    </div>
                </div>
                <div class="text-stuff">
                    <div class="text-main">
                        <form action="procesare_date.php" method="post">
                            <label for="date_field">Enter the data you want to edit [ using ' , ' to separate the information ]:</label>
                            <input type="text" id="date_field" name="date_field" required><br>
                            <input type="submit" value="Save">
                            <input type="submit" value="Delete">
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