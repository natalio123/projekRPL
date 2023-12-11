<?php
session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Pengguna belum login, arahkan ke halaman login
    header("Location: index.php");
    exit();
}
    // Koneksi ke database (ganti dengan detail koneksi Anda)
$host = "localhost";
$username = "root";
$password = "";
$db = "user_db";

$conn = new mysqli($host, $username, $password, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan data reservasi
$query = "SELECT * FROM reservasi_form";
$result = $conn->query($query);
// Ambil data reservasi ke dalam array
$reservasiData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reservasiData[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard Manajer</title>
    <link rel="stylesheet" href="/rpl-project/manajer/style.css" />
    <link rel="icon" href="/rpl-project/image/img.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="#">WarongWarem</a>
            <div class="search_box">
                <input type="text" placeholder="Search ">
                <i class="fas fa-search"></i>
            </div>
        </div>

        <button class="tombol" onclick="logout()">Logout</button>
        </div>
    </header>

    <div class="container">
        <nav>
            <div class="side_navbar">
                <span>Main Menu</span>
                <a href="#" class="active">Dashboard</a>
                <a href="#">Profile</a>
                <a href="#">Laporan Reservasi</a>
                <a href="#">Manajemen Meja</a>
            </div>
        </nav>

        <div class="main-body">
            <h2>Dashboard</h2>

            <div class="promo_card">
                <h1>Welcome <?php echo isset($_SESSION['user_name']) ? $_SESSION['username'] : 'Guest'; ?> </h1>
                <span>Manajer WarongWarem</span>
            </div>

            <div class="history_lists">
                <div class="list1">
                    <div class="row">
                        <h4>Laporan Reservasi</h4>
                    </div>
                    <table>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Jumlah Orang</th>
                            <th>Jenis Meja</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        foreach ($reservasiData as $row) {
                            echo "<tr>
                                    <td>" . $row['tanggal'] . "</td>
                                    <td>" . $row['waktu'] . "</td>
                                    <td>" . $row['jumlah_orang'] . "</td>
                                    <td>" . $row['jenis_meja'] . "</td>
                                    <td>" . ($row['status'] ?? 'Tidak ada') . "</td>
                                </tr>";
                        }
                        ?>
                    </table>
                </div>

                <div class="list2">
                    <div class="row">
                        <h4>Manajemen Meja</h4>
                    </div>
                    <table>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        foreach ($reservasiData as $row) {
                            echo "<tr>
                        <td>" . $row['nama'] . "</td>
                        <td>" . ($row['status'] ?? 'Tidak ada') . "</td>
                      </tr>";
                    }
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="manajer/script.js"></script>
</body>
</html>

