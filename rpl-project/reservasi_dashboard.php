<?php
session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Pengguna belum login, arahkan ke halaman login
    header("Location: index.php");
    exit();
}

$host = "localhost";
$username = "root"; 
$password = ""; 
$db = "user_db"; 

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservasi Meja Restoran WarongWarem</title>
    <link rel="stylesheet" type="text/css" href="/rpl-project/users/reservasi/style.css">
    
    <link rel="icon" href="/rpl-project/image/img.jpg">
</head>
<body>
    <h1>Reservasi Meja </h1>
    <form action="reservasi_form.php" method="post" >
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" required>

        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required><br>
        
        <label for="waktu">Waktu:</label>
        <input type="time" id="waktu" name="waktu" required><br>
        
        <label for="jumlah-orang">Jumlah Orang:</label>
        <input type="number" id="jumlah-orang" name="jumlah-orang" required><br>
        
        <label for="jenis-meja">Jenis Meja:</label>
        <select id="jenis-meja" name="jenis-meja" required>
            <option value="meja-kecil">Meja Kecil</option>
            <option value="meja-panjang">Meja Panjang</option>
            <option value="meja-VIP">Meja VIP</option>
        </select><br>
        
        <input type="submit" value="Reservasi">
    </form>
    <script src="users/reservasi/script.js"></script>
</body>
</html>
