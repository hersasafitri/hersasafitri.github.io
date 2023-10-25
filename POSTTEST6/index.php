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

            <tbody>
                <?php
                include("crud.php");
                $dataWisata = tampilkanData();
                foreach ($dataWisata as $wisata) {
                    echo "<tr>";
                    echo "<td>{$wisata['nama_wisata']}</td>";
                    echo "<td>{$wisata['deskripsi']}</td>";
                    echo "<td>{$wisata['lokasi']}</td>";
                    echo "<td><img src='{$wisata['gambar']}' alt='{$wisata['nama_wisata']}' width='100'></td>"; // Menampilkan gambar
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
        <form action="crud.php" method="POST" enctype="multipart/form-data">
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
            <div class="form-group">
            <input type="file" id="gambar" name="gambar" accept="image/*">
        </div>

            <button type="submit" name="tambah">Tambah</button>
        </form>

          <!-- Display Date and Time Using PHP -->
          <div id="judul-waktu">
        Waktu Saat Ini
    </div>
          <div id="waktu">
        <?php
        date_default_timezone_set('Asia/Makassar');
        $currentDate = date('Y-m-d');
        $currentDay = date('l');
        $currentTime = date('H:i:s');
        echo " " . $currentDay;
        echo "<br>";
        echo "Date: " . $currentDate;
        ?>
    </div>
    </div>
    <div id="jam">
    Time: <span id="waktu-jam"></span>:<span id="waktu-menit"></span>:<span id="waktu-detik"></span>  WITA
</div>

    <script>
        // Function to update time
        function updateClock() {
            const now = new Date();
            const jamElement = document.getElementById('waktu-jam');
            const menitElement = document.getElementById('waktu-menit');
            const detikElement = document.getElementById('waktu-detik');

            jamElement.textContent = String(now.getHours()).padStart(2, '0');
            menitElement.textContent = String(now.getMinutes()).padStart(2, '0');
            detikElement.textContent = String(now.getSeconds()).padStart(2, '0');

            setTimeout(updateClock, 1000); // Update every second
        }

        // Initial call to set the clock
        updateClock();
    </script>
</head>
<body>
 


    <style>
 body {
            font-family: 'Montserrat', sans-serif;
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

        
        #judul-waktu {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #333; /* Warna teks sesuaikan sesuai keinginan Anda */
        }
        
        #waktu {
            font-size: 18px;
            text-align: center;
            color: #555; /* Warna teks sesuaikan sesuai keinginan Anda */
        }
        
        #jam {
            font-size: 24px;
            text-align: center;
            color: #0077b6; /* Warna teks sesuaikan sesuai keinginan Anda */
        }




</style>
 
</html>
