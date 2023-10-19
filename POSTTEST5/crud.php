<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "pemweb5"; 

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

// Fungsi untuk menambahkan data
if (isset($_POST['tambah'])) {
    $nama_wisata = $_POST['nama_wisata'];
    $deskripsi = $_POST['deskripsi'];
    $lokasi = $_POST['lokasi'];

    $query = "INSERT INTO wisata (nama_wisata, deskripsi, lokasi) VALUES ('$nama_wisata', '$deskripsi', '$lokasi')";
    mysqli_query($conn, $query);
    header("Location: index.php");
}

// Fungsi untuk mengedit data
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama_wisata = $_POST['nama_wisata'];
    $deskripsi = $_POST['deskripsi'];
    $lokasi = $_POST['lokasi'];

    $query = "UPDATE wisata SET nama_wisata='$nama_wisata', deskripsi='$deskripsi', lokasi='$lokasi' WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: index.php");
}

// Fungsi untuk menghapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM wisata WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>
