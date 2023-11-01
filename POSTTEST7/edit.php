<!doctype html>
<html lang="en">
<head>
    <!-- ... (head section) ... -->
</head>
<body>
<style>
    /* Gaya khusus untuk halaman edit.php */
    .edit-container {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .edit-container h2 {
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: vertical; /* Memungkinkan pengguna mengubah ukuran vertikal textarea */
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

    <!-- Navbar -->
    <!-- ... (Navbar section) ... -->

    <!-- Form Edit -->
    <section class="container">
        <h2>Edit Data Wisata</h2>
        <?php
        include("crud.php");

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $dataWisata = mysqli_query($conn, "SELECT * FROM wisata WHERE id=$id");
            $wisata = mysqli_fetch_array($dataWisata);
        }
        ?>
        <form action="crud.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $wisata['id']; ?>">
            <div class="form-group">
                <label for="nama_wisata">Nama Wisata:</label>
                <input type="text" id="nama_wisata" name="nama_wisata" value="<?php echo $wisata['nama_wisata']; ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" required><?php echo $wisata['deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" value="<?php echo $wisata['lokasi']; ?>" required>
            </div>
            <button type="submit" name="edit">Edit</button>
        </form>
    </section>

    <!-- ... (Footer section) ... -->
</body>
</html>
