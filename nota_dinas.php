<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}

if(isset($_POST['submit'])) {
    // Ambil data dari form
    $jenis_nota = $_POST['jenis_nota'];
    $tgl_nota = $_POST['tgl_nota'];
    $sifat = $_POST['sifat'];
    $perihal = $_POST['perihal'];
    $ringkasan = $_POST['ringkasan'];
    $dikirim_kpd = $_POST['dikirim_kpd'];
    $ditandatangani_oleh = $_POST['ditandatangani_oleh'];
    $bidang = $_POST['bidang'];

    // Handle file upload
    $pdf_path = '';
    if(isset($_FILES['pdf']['name']) && $_FILES['pdf']['name'] != '') {
        $target_dir = "uploads/";
        $pdf_path = $target_dir . basename($_FILES["pdf"]["name"]);
        move_uploaded_file($_FILES["pdf"]["tmp_name"], $pdf_path);
    }

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'surat_keluar_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO nota_dinas (jenis_nota, tgl_nota, sifat, perihal, ringkasan, dikirim_kpd, ditandatangani_oleh, bidang, pdf_path)
            VALUES ('$jenis_nota', '$tgl_nota', '$sifat', '$perihal', '$ringkasan', '$dikirim_kpd', '$ditandatangani_oleh', '$bidang', '$pdf_path')";

    if ($conn->query($sql) === TRUE) {
        echo "Nota dinas berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Dinas Baru</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="nota_dinas.php">Nota Dinas</a>
        <a href="data.php">Data</a>
        <a href="logout.php">Log Out</a>
    </div>
    <div class="table-container">
        <h1>Nota Dinas Baru</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="jenis_nota">Jenis Nota:</label>
            <input type="text" id="jenis_nota" name="jenis_nota" required>

            <label for="tgl_nota">Tanggal Nota:</label>
            <input type="date" id="tgl_nota" name="tgl_nota" required>

            <label for="sifat">Sifat:</label>
            <input type="text" id="sifat" name="sifat" required>

            <label for="perihal">Perihal:</label>
            <input type="text" id="perihal" name="perihal" required>

            <label for="ringkasan">Ringkasan:</label>
            <textarea id="ringkasan" name="ringkasan" required></textarea>

            <label for="dikirim_kpd">Dikirim Kepada:</label>
            <select id="dikirim_kpd" name="dikirim_kpd" required>
                <option value="Kepala Bidang Pembudayaan Olahraga Pemuda dan Olahraga">Kepala Bidang Pembudayaan Olahraga Pemuda dan Olahraga</option>
                <option value="Sekertaris Kepemudaan dan Olahraga">Sekertaris Kepemudaan dan Olahraga</option>
                <option value="Kepala Bidang Olahraga Prestasi">Kepala Bidang Olahraga Prestasi</option>
                <option value="Kepala Bidang Pembudayaan Olahraga">Kepala Bidang Pembudayaan Olahraga</option>
                <option value="Kepala Bidang Kepramukaan">Kepala Bidang Kepramukaan</option>
                <option value="Kepala Bidang Kepemudaan">Kepala Bidang Kepemudaan</option>
                <!-- tambahkan pilihan lainnya sesuai kebutuhan -->
            </select>

            <label for="ditandatangani_oleh">Ditandatangani Oleh:</label>
                <!-- disini harusnya itu default bidang kepemudaan -->
            
            <label for="bidang">Bidang:</label>
            <input type="text" id="bidang" name="bidang" required>

            <label for="pdf">Upload PDF:</label>
            <input type="file" id="pdf" name="pdf" accept="application/pdf">

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
