<?php
include 'integration.php';

if ($_SESSION['role'] != 2) {
    die("Akses ditolak");
}

$id_peserta = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $programs = $_POST['programs'];
    foreach ($programs as $id_program) {
        $sql = "INSERT INTO participant_program (id_peserta, id_program) VALUES ($id_peserta, $id_program)";
        $conn->query($sql);
    }
    echo "Program berhasil dipilih!";
}

$sql = "SELECT * FROM program";
$result = $conn->query($sql);

echo "<form action='pilih_program.php' method='POST'>";
while ($row = $result->fetch_assoc()) {
    echo "<input type='checkbox' name='programs[]' value='{$row['id_program']}'> {$row['nama_program']}<br>";
}
echo "<input type='submit' value='Pilih Program'>";
echo "</form>";

$conn->close();
?>