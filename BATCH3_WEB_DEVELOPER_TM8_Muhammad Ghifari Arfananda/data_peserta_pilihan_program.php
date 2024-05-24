<?php
include 'koneksi.php';

if ($_SESSION['role'] != 1) {
    die("Akses ditolak");
}

$sql = "SELECT u.nama AS nama_peserta, GROUP_CONCAT(p.nama_program SEPARATOR ', ') AS program_pelatihan
        FROM user u
        JOIN participant_program pp ON u.id = pp.id_peserta
        JOIN program p ON pp.id_program = p.id_program
        WHERE u.role = 2
        GROUP BY u.nama";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Peserta dan Program yang Dipilih</h2>";
}
?>