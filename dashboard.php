<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="nota_dinas.php">Nota Dinas</a>
        <a href="data.php">Data</a>
        <a href="logout.php">Log Out</a>
    </div>
    <div class="content">
        <h1>Dashboard</h1>
        <div class="chart">
            <!-- Chart implementation here -->
        </div>
    </div>
</body>
</html>
