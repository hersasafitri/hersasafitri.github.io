<!doctype html>
<html lang="en">
<head>
    <!-- ... (head section) ... -->
</head>
<body>
    <!-- Navbar -->
    <!-- ... (Navbar section) ... -->

    <!-- Content -->
    <section class="container">
        <h2>Data Wisata</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Wisata</th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("crud.php");
                $dataWisata = tampilkanData();
                foreach ($dataWisata as $wisata) {
                    echo "<tr>";
                    echo "<td>{$wisata['nama_wisata']}</td>";
                    echo "<td>{$wisata['deskripsi']}</td>";
                    echo "<td>{$wisata['lokasi']}</td>";
                    echo "<td><a href='edit.php?id={$wisata['id']}'>Edit</a> | <a href='crud.php?hapus={$wisata['id']}'>Hapus</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Form Input -->
    <section class="container">
        <h2>Input Data Wisata</h2>
        <form action="crud.php" method="POST">
            <div class="form-group">
                <label for="nama_wisata">Nama Wisata:</label>
                <input type="text" id="nama_wisata" name="nama_wisata" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" required>
            </div>
            <button type="submit" name="tambah">Tambah</button>
        </form>
    </section>

    <!-- ... (Footer section) ... -->

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    h2 {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    form {
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

</style>

</body>
</html>
