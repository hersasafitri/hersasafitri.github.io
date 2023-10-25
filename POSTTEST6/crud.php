<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (head section) ... -->
</head>
<body>
    <!-- Navbar -->
    <!-- ... (Navbar section) ... -->

    <!-- Content -->
    <section class="container">
        <table>
            <thead>
                <tr>
                    <th>Nama Wisata</th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Panggil fungsi tampilkanData
                $data = tampilkanData();
                foreach ($data as $row) {
                    echo "<tr>";
                    echo "<td>{$row['nama_wisata']}</td>";
                    echo "<td>{$row['deskripsi']}</td>";
                    echo "<td>{$row['lokasi']}</td>";
                    echo "<td><img src='uploads/{$row['gambar']}' alt='Gambar Wisata' width='100'></td>";
                    echo "<td><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='hapus.php?id={$row['id']}'>Hapus</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Form Input -->
    <!-- ... (Form Input section) ... -->
</body>
</html>

</body>
</html>
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "posttest6";

// Koneksi ke database
$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk menampilkan data
function tampilkanData() {
    global $conn;
    $query = "SELECT * FROM wisata";
    $result = mysqli_query($conn, $query);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

if (isset($_POST['tambah'])) {
    // Dapatkan data dari formulir
    $namaWisata = $_POST['nama_wisata'];
    $deskripsi = $_POST['deskripsi'];
    $lokasi = $_POST['lokasi'];

    // Periksa apakah berkas gambar diunggah
    if (isset($_FILES['gambar'])) {
        $gambar = $_FILES['gambar'];

        if ($gambar['error'] === 0) {
            // Berkas diunggah dengan sukses, lanjutkan pemrosesan
            $gambarName = $gambar['name'];
            $gambarTmpName = $gambar['tmp_name'];

            // Pemeriksaan tipe berkas (misalnya, hanya menerima gambar dengan ekstensi jpg, png)
            $fileInfo = pathinfo($gambarName);
            $allowedExtensions = array('jpg', 'png');

            if (in_array($fileInfo['extension'], $allowedExtensions)) {
                $uploadDir = 'uploads/';
                $gambarDestination = $uploadDir . $gambarName;

                if (move_uploaded_file($gambarTmpName, $gambarDestination)) {
                    // Gambar berhasil diunggah, lakukan penyimpanan ke database
                    $query = "INSERT INTO wisata (nama_wisata, deskripsi, lokasi, gambar) VALUES ('$namaWisata', '$deskripsi', '$lokasi', '$gambarName')";
                    mysqli_query($conn, $query);
                    header('Location: index.php');
                    exit();
                } else {
                    echo "Gagal mengunggah berkas.";
                }
            } else {
                echo "Tipe berkas tidak valid. Hanya menerima gambar dengan ekstensi jpg atau png.";
            }
        } else {
            // Tangani kesalahan unggahan berkas
            echo "Kesalahan unggah berkas. Kode kesalahan: " . $gambar['error'];
        }
    }
}

// Fungsi untuk mengedit data
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $namaWisata = $_POST['nama_wisata'];
    $deskripsi = $_POST['deskripsi'];
    $lokasi = $_POST['lokasi'];

    // Periksa apakah berkas gambar diunggah
    if (isset($_FILES['gambar'])) {
        $gambar = $_FILES['gambar'];

        if ($gambar['error'] === 0) {
            // Berkas diunggah dengan sukses, lanjutkan pemrosesan
            $gambarName = $gambar['name'];
            $gambarTmpName = $gambar['tmp_name'];

            // Pemeriksaan tipe berkas (misalnya, hanya menerima gambar dengan ekstensi jpg, png)
            $fileInfo = pathinfo($gambarName);
            $allowedExtensions = array('jpg', 'png');

            if (in_array($fileInfo['extension'], $allowedExtensions)) {
                $uploadDir = 'uploads/';
                $gambarDestination = $uploadDir . $gambarName;

                if (move_uploaded_file($gambarTmpName, $gambarDestination)) {
                    // Gambar berhasil diunggah, lakukan pembaruan data di database
                    $query = "UPDATE wisata SET nama_wisata='$namaWisata', deskripsi='$deskripsi', lokasi='$lokasi', gambar='$gambarName' WHERE id=$id";
                    mysqli_query($conn, $query);
                    header('Location: index.php');
                    exit();
                } else {
                    echo "Gagal mengunggah berkas.";
                }
            } else {
                echo "Tipe berkas tidak valid. Hanya menerima gambar dengan ekstensi jpg atau png.";
            }
        } else {
            // Tangani kesalahan unggahan berkas
            echo "Kesalahan unggah berkas. Kode kesalahan: " . $gambar['error'];
        }
    } else {
        // Jika tidak ada unggahan gambar, lakukan pembaruan data tanpa mengubah gambar
        $query = "UPDATE wisata SET nama_wisata='$namaWisata', deskripsi='$deskripsi', lokasi='$lokasi' WHERE id=$id";
        mysqli_query($conn, $query);
        header('Location: index.php');
        exit();
    }
}

// Fungsi untuk menghapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    // Hapus gambar terkait dari folder 'uploads'
    $query = "SELECT gambar FROM wisata WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $gambarHapus = $row['gambar'];
    $uploadDir = 'uploads/';
    $gambarPath = $uploadDir . $gambarHapus;
    unlink($gambarPath);
    // Hapus data dari database
    $query = "DELETE FROM wisata WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
