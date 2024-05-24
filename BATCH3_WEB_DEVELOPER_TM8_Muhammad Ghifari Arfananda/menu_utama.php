<?php
include 'integration.php';

// Periksa apakah sesi telah dimulai dan variabel 'role' telah didefinisikan
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role']; // Dapatkan role pengguna yang login
} else {
    // Tindakan yang sesuai jika pengguna belum login atau sesi tidak ada
    // Misalnya, arahkan pengguna ke halaman login
    header("Location: integration.php");
    exit(); // Pastikan keluar dari skrip setelah mengarahkan
}

echo '<nav>';
echo '<ul>';
echo '<li><a href="home.php">Beranda</a></li>';
echo '<li><a href="agenda.php">Agenda</a></li>';
if ($role == 1) { // Role admin
    echo '<li><a href="kelola_data.php">Kelola Data</a></li>';
}
if ($role == 2) { // Role peserta
    echo '<li><a href="pilih_program.php">Pilih Program Pelatihan</a></li>';
}
echo '<li><a href="profile.php">Profil</a></li>';
echo '<li><a href="logout.php">Keluar</a></li>';
echo '</ul>';
echo '</nav>';
?>