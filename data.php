<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'surat_keluar_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM surat";
$result = $conn->query($sql);

$surat_list = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $surat_list[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Surat</title>
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
        <h1>Data Surat</h1>
        <table>
            <tr>
                <th>No</th>
                <th>Jenis Surat</th>
                <th>Nomor Lengkap</th>
                <th>Tgl Surat</th>
                <th>Tentang</th>
                <th>Action</th>
            </tr>
            <?php foreach($surat_list as $index => $surat) { ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo $surat['jenis_surat']; ?></td>
                <td><?php echo $surat['nomor_lengkap']; ?></td>
                <td><?php echo $surat['tgl_surat']; ?></td>
                <td><?php echo $surat['tentang']; ?></td>
                <td><button onclick="showDetail(<?php echo $surat['id']; ?>)">Detail</button></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div id="detail-popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeDetail()">&times;</span>
            <div id="popup-detail"></div>
        </div>
    </div>
</body>
</html>
