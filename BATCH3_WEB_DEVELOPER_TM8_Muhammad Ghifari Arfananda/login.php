<?php
include 'integration.php'; // Sertakan koneksi ke database


// Periksa apakah pengguna sudah login, jika ya, arahkan kembali ke halaman utama
if (isset($_SESSION['role'])) {
    header("Location: menu_utama.php");
    exit();
}

// Inisialisasi variabel untuk menyimpan pesan kesalahan
$pesan_error = '';

// Jika formulir login disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data formulir
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Lakukan validasi data
    if (empty($email) || empty($password)) {
        $pesan_error = 'Email dan password harus diisi';
    } else {
        // Hash kata sandi (asumsi kata sandi Anda tersimpan dalam database dalam bentuk hash)
        $hashed_password = md5($password); // Contoh penggunaan hash, sebaiknya gunakan algoritma hashing yang lebih kuat seperti bcrypt

        // Jalankan query SQL untuk mencari pengguna dengan email dan password yang cocok
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$hashed_password'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Pengguna ditemukan, atur sesi dan arahkan ke halaman utama
            $row = $result->fetch_assoc();
            $_SESSION['role'] = $row['role'];
            $_SESSION['id'] = $row['id'];
            header("Location: menu_utama.php");
            exit();
        } else {
            // Email atau password salah
            $pesan_error = 'Email atau password salah';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <?php if (!empty($pesan_error)) : ?>
        <p style="color: red;"><?php echo $pesan_error; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>

<?php
// Tutup koneksi database
$conn->close();
?>