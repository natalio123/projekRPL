<?php
session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Pengguna belum login, arahkan ke halaman login
    header("Location: index.php");
    exit();
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
                <h1>Welcome [nama] </h1>
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
                        <tr>
                            <td>01/01/2022</td>
                            <td>19:00</td>
                            <td>4</td>
                            <td>Meja Tengah</td>
                            <td>Dikonfirmasi</td>
                        </tr>
                        <tr>
                            <td>02/01/2022</td>
                            <td>20:30</td>
                            <td>6</td>
                            <td>Meja Sudut</td>
                            <td>Menunggu Konfirmasi</td>
                        </tr>
                    </table>
                </div>

                <div class="list2">
                    <div class="row">
                        <h4>Manajemen Meja</h4>
                    </div>
                    <table>
                        <tr>
                            <th>Nomor Meja</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Tersedia</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tersedia</td>
                        </tr>
                        <!-- Tambahkan baris lain sesuai dengan data manajemen meja -->
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="manajer/script.js"></script>
</body>
</html>

