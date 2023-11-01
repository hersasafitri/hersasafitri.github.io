<?php
require "koneksi_login.php";

if (isset($_POST["register"])) {
  $username = strtolower($_POST["username"]);
  $pass = $_POST["password"];
  $konfirmasi = $_POST["konfirmasi"];
  $role = 'user';

  // Ubah true disini
  if ($pass === $konfirmasi) {
    // Ubah pass dan result disini
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username' ");

    // Ubah true disini
    if (mysqli_fetch_assoc($result)) {
      echo "
          <script>
            alert('Username telah digunakan');
            document.location.href = 'register.php';
          </script>
        ";
    } else {
      // Ubah sql dan result disini
      $sql = "INSERT INTO users VALUES ('', '$role', '$username', '$pass')";
      $result = mysqli_query($koneksi, $sql);

      if (mysqli_affected_rows($koneksi) > 0) {
        echo "
          <script>
            alert('Registrasi berhasil');
            document.location.href = 'login.php';
          </script>
        ";
      } else {
        echo "
          <script>
            alert('Registrasi gagal');
            document.location.href = 'register.php';
          </script>
        ";
      }
    }
  } else {
    echo "
        <script>
          alert('Password tidak sama');
          document.location.href = 'register.php';
        </script>
      ";
  }
}
?>

<style>
 body {
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #FFD1DC; /* Warna merah muda */
  background-image: linear-gradient(to right, #FFD1DC 0%, #FADDE1 100%);
}

.container {
  background: white;
  border-radius: 20px; /* Tambahkan lengkungan */
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05); /* Bayangan yang lebih halus */
  overflow: hidden;
  width: 400px;
  max-width: 100%;
  padding: 30px;
}

h3 {
  text-align: center;
  color: #FF6B81; /* Warna pink yang lebih cerah */
  margin-bottom: 25px;
  font-weight: 600;
}

.inputBox {
  position: relative;
  margin-bottom: 20px;
}

.inputBox label {
  display: inline-block;
  margin-bottom: 10px;
  color: #333;
}

.inputBox input,
.inputBox select {
  width: 100%;
  padding: 12px;
  border: 1px solid #FFC0CB; /* Warna pink */
  border-radius: 10px; /* Tambahkan lengkungan */
  box-sizing: border-box;
  font-size: 15px;
}

.inputBox input:focus,
.inputBox select:focus {
  outline-color: #FF6B81;
}

input[type="submit"] {
  width: 100%;
  padding: 12px;
  border: none;
  background-color: #FF6B81; /* Warna pink yang lebih cerah */
  color: white;
  border-radius: 10px; /* Tambahkan lengkungan */
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #E5536B;
}

.links {
  text-align: center;
  margin-top: 20px;
}

.links p {
  color: #666;
  margin-bottom: 8px;
}

a {
  text-decoration: none;
  color: #E5536B;
  transition: color 0.3s;
}

a:hover {
  color: #FF6B81;
}

.khusus {
  font-weight: 600;
}



</style>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="register-login.css">
</head>

<body>
  <div class="bg">
    <div class="container">
      <form action="" method="POST">
        <h3>Register</h3>
        <div class="inputBox">
          <label for="">Username</label>
          <input type="text" name="username" placeholder="username" required>
        </div>
        <div class="inputBox">
          <label for="">Password</label>
          <input type="password" name="password" placeholder="password" required>
        </div>
        <div class="inputBox">
          <label for="">Konfirmasi Password</label>
          <input type="password" name="konfirmasi" placeholder="password" required>
        </div>
        <input type="submit" value="Register" name="register">

        <br><br><a href="login.php" background-color= #ff9a9e;>Kembali</a>
      </form>
    </div>
  </div>
</body>

</html>