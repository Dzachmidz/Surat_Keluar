<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'surat_keluar_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM surat WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $detail = $result->fetch_assoc();
        echo json_encode($detail);
    } else {
        echo json_encode([]);
    }

    $conn->close();
}
?>
