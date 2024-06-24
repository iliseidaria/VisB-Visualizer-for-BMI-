<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisB</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                            <li><a href="/Test/">Home</a></li>
                            <li><a href="/Test/statistics">Statistics</a></li>
                            <li><a href="/Test/comparison">Comparison</a></li>
                            <li><a href="/Test/visualization">Visualization</a></li>
                            <li><a href="/Test/contact">Contact</a></li>
                            <li><a href="/Test/login">Login</a></li>
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
                            <li><a href="/Test/">Home</a></li>
                            <li><a href="/Test/statistics">Statistics</a></li>
                            <li><a href="/Test/comparison">Comparison</a></li>
                            <li><a href="/Test/visualization">Visualization</a></li>
                            <li><a href="/Test/contact">Contact</a></li>
                            <li><a href="/Test/login">Login</a></li>
                        </ul>
                        <div id="menu-close-bar" class="menu-close-bar"> Close</div>
                    </div>
                </div>

                <div class="description">
                    
                </div>

                <div class="results">
                    <!-- aici trebuie sa apara chartul -->
                    <iframe src="/Test/View/bar_chart.php" style="width: 100%; height: 600px; border: none;"></iframe>

                    <!-- Grija marea aici, ca te trimite in pagina home router-ul -->
                </div>
                
                <div class="export">
                    <p class="export-text">Export as:</p>
                    <div class="action-buttons">
                        <button type="button">CSV</button>
                        <button type="button">WebP</button>
                        <button type="button">SVG</button>
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
