<?php
include 'integration.php';

if ($_SESSION['role'] != 1) {
    die("Akses ditolak");
}

echo '<h2>Kelola Data</h2>';
echo '<ul>';
echo '<li><a href="kelola_peserta.php">Kelola Peserta</a></li>';
echo '<li><a href="kelola_pelatih.php">Kelola Pelatih</a></li>';
echo '<li><a href="kelola_program.php">Kelola Program</a></li>';
echo '<li><a href="kelola_berita.php">Kelola Berita</a></li>';
echo '</ul>';
?>