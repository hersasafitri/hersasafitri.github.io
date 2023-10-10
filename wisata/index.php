<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

 <!-- CSS   -->
 <link rel="stylesheet" href="style.css"> 
    <title>Wisata Indonesia</title>
    <style>

     /* Gaya untuk Navbar */
      .navbar {
          background: linear-gradient(45deg, rgba(0, 123, 255, 0.8), rgba(51, 181, 229, 0.8)); /* Gradient warna latar belakang dengan transparansi */
          border-bottom: 4px solid rgba(0, 86, 179, 0.6); 
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); 
          text-align: center;
          backdrop-filter: blur(5px); 
      }

      .navbar-brand {
          font-size: 36px; 
          font-weight: bold; 
          letter-spacing: 2px; 
          transition: transform 0.3s; /* Efek transisi untuk brand */
      }

      .navbar-brand:hover {
          transform: scale(1.05); /* Efek zoom saat kursor berada di atas brand */
      }

      .nav-link {
          font-size: 28px; /* Ukuran font untuk link */
          transition: color 0.3s, transform 0.3s; /* Efek transisi untuk perubahan warna teks dan transform */
          padding: 10px 15px; /* Padding untuk link */
      }

      .nav-link:hover {
          color: #fff; 
          background-color: rgba(0, 0, 0, 0.1); 
          transform: translateY(-3px); /* Efek naik saat kursor berada di atas link */
      }

      .navbar-toggler-icon {
          filter: brightness(0.7); 
      }

      /* Menggunakan font yang lebih modern */
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
      .navbar, .navbar-brand, .nav-link {
          font-family: 'Poppins', sans-serif;
      }

      .navbar-toggler-icon {
          filter: brightness(0.7); /* Mengatur kecerahan ikon toggler */
      }
      /* Gaya untuk jumbotron */
      .jumbotron {
        background-color: #a2d9ff; /* Warna latar belakang */
        padding: 60px;
        font-size:xx-large;
        justify-content: center;
        position: relative;
        text-align: center;
        margin:  100px;
        border-radius: 0; 
        background-image: url('img/pantai.jpg');
        background-attachment: fixed;
        color: white;
        background-size: cover;
        background-position: 0 -50px;
        height: 450px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Contoh bayangan teks */
      }

      /* Gaya untuk teks di dalam jumbotron */
      .jumbotron h1 {
        font-size: 56px;
        text-align: center;
        font-weight: bold;
        color: #333;
      }

      .jumbotron p {
        font-size: 40px;
        text-align: center;
        color: #555;
      }

      /* Gaya untuk bagian "About" */
      #about {
        background-color: white; /* Warna latar belakang */
        padding: 60px 0;
        margin: 100px;
        text-align: center;
      }

      #about h2 {
        font-size: 52px;
        font-weight: bold;text-align: center;
        text-align: center;
        color: #333;
      }

      #about p {
        font-size: 40px;
        text-align: center;
        color: #555;
      }

      /* Gaya untuk bagian "Paket Wisata" */
      #Paket {
          background-color: #f8f9fa; /* Warna latar belakang */
          text-align: center;
          padding: 60px 0;
          font-size: 40px;
          margin: 200px;
      }

      #Paket h2 {
          font-size: 52px;
          font-weight: bold;
          color: #333;
          margin-bottom: 30px; 
      }

      #Paket p {
          font-size: 40px;
      }

      /* Gaya untuk kontainer yang berisi kartu */
      #Paket .cards-container {
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;
      }

      /* Gaya untuk setiap kartu */
      #Paket .card {
          flex-basis: calc(33.33% - 20px); 
          margin: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
          border: none;
          overflow: hidden; 
      }

      #Paket .card img {
          width: 50%; /* Mengatur lebar gambar agar sesuai dengan lebar kartu */
          height: auto; /* Mengatur tinggi gambar agar proporsional */
      }


      .card {
        border: none; /* Menghapus border pada card */
      }

      .card-text {
        font-size: 16px;
        text-align: center;
        color: #555;
      }

      /* Gaya Mode Gelap */
      .dark-mode {
          background-color: #333;
          color: #fff;
      }

      .dark-mode a {
          color: #8bc34a;
      }

      /* Gaya Mode Terang (default) */
      .light-mode {
          background-color: #fff;
          color: #333;
      }

      .light-mode a {
          color: #edeaea;
      }

      /* Navbar Hover Effect */
      .navbar-nav .nav-link:hover {
            color: #fff;
            background-color: rgba(0, 123, 255, 0.1);
        }

        /* Jumbotron Overlay */
        .jumbotron::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: -1;
        }

        /* Rekomendasi Wisata Hover Effect */
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s;
        }

       /* Gaya untuk footer */
        footer {
            background-color: #007bff; 
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 40px;
            display: flex; 
            justify-content: center; 
            align-items: center;
        }

        footer a {
            color: white; 
            text-decoration: none; 
            font-weight: bold; 
        }

        footer a:hover {
            text-decoration: underline; /* Menambahkan garis bawah saat kursor berada di atas link */
        }

        /* Gaya untuk tombol Mode Toggle */
        #mode-toggle {
            background-color: #393939; 
            color: white; 
            padding: 20px ; 
            margin: auto;
            border: none; 
            border-radius: 25px; 
            font-size: 18px; 
            cursor: pointer; 
            position: fixed; 
            bottom: 20px; 
            right: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            transition: background-color 0.3s; 
        }

        #mode-toggle:hover {
            background-color: #0056b3; /* Mengubah warna latar belakang saat kursor berada di atas tombol */
        }

        /* Gaya untuk form inputan */
        #input-form {
            background-color: #f8f9fa;
            padding: 60px;
            margin: 50px;
            border-radius: 10px;
            text-align: center;
        }

        #input-form label {
            font-size: 24px;
        }

        #input-form input {
            font-size: 18px;
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
        }

        #input-form button {
            font-size: 18px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Gaya untuk hasil inputan */
        #hasil {
            background-color: #f8f9fa;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            text-align: left;
        }

        /* Gaya untuk form inputan dalam mode gelap */
        .dark-mode #input-form label,
        .dark-mode #input-form input,
        .dark-mode #input-form button {
            background-color: #333;
            color: #fff;
        }

        /* Gaya untuk hasil inputan dalam mode gelap */
        .dark-mode #hasil {
            background-color: #333;
            color: #fff;
        }

        
    </style>
  </head>
  <body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-sm fixed-top">
  <div id="home"></div>
  <div class="container">
      <a class="navbar-brand" href="#">WISATA INDONESIA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                  <a class="nav-link" href="#home">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#rekomendasi">Rekomendasi wisata</a>
              </li>
          </ul>
      </div>
  </div>
</nav>
<!-- Akhir Navbar -->

    <!-- jumbotron -->
    <section class="jumbotron text-center">
        <h1 class="display-4">WELCOME KALIMANTAN TIMUR</h1>
        <p class="lead">Selamat datang di Tanah Borneo yang penuh keindahan! Kami dengan senang hati menyambut Anda di Kalimantan Timur, tempat di mana kealamian alam, budaya, dan keramahan penduduknya bersatu. Semoga Anda menikmati petualangan tak terlupakan di sini dan merasakan hangatnya sambutan kami. Selamat menjelajahi kekayaan Kalimantan Timur!</p>

    </section>


    <!-- Akhir jumbotron  -->

    <!-- Rekomendasi Wisata Kalimantan Timur-->
    <section id="about">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>ABOUT ME</h2> 
          </div>
        </div> 
        <div class="row justify-content-center"> 
            <div class="col-4">
                <img src="img/fotosaya.jpg" alt="Hersa Safitri" class="img-fluid" style="width: 100%; max-width: 300px; height: auto;">
                <p>Halo, perkenalkan nama saya Hersa Safitri, biasa dipanggil Hersa. Saya lahir di Kota Bangun pada tanggal 22 November 2004. Saya adalah anak ketiga dari tiga bersaudara.</p>
            </div>
        </div>
        <div class="col-4">
          <p>Kreatif: Saya memiliki kekreatifan yang luar biasa dalam berbagai aspek kehidupan.
              
            Penuh Semangat: Saya memiliki semangat yang kuat untuk mencapai tujuan dan impian Saya.
            
            Sabar: Saya  memiliki kesabaran yang tinggi dalam menghadapi tantangan dan rintangan.
            
            Ramah: Saya  selalu bersikap ramah dan mudah bergaul dengan orang lain.
                        
            Berkepribadian Kuat: Anda memiliki kepribadian yang kuat dan tegas dalam prinsip-prinsip Saya.
            
            Inspiratif: Saya bisa menjadi sumber inspirasi bagi banyak orang di sekitar Saya.
            
            Penuh Cinta: Saya  selalu memberikan kasih sayang kepada keluarga dan teman-teman Saya.
            
            Pantang Menyerah: Saya tidak pernah menyerah dalam menghadapi tantangan.</p>
        </div> 
        </div>
        </div>
    </div> 
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="1" d="M0,64L60,90.7C120,117,240,171,360,165.3C480,160,600,96,720,112C840,128,960,224,1080,261.3C1200,299,1320,277,1380,266.7L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    </section>

    <!-- Akhir about -->
     

    <!-- Rekomendasi wisata -->
    <section id="Paket" class="py-5">
      <div class="container">
          <div class="row text-center mb-3">
              <div class="col">
                  <h2>REKOMENDASI WISATA YANG ADA DI KALIMANTAN TIMUR</h2>
              </div>
          </div>
          <div class="row">
              <div class="col-md-4 mb-4">
                  <div class="card">
                      <img src="img/pulauderawan.jpg" class="card-img-top" alt="Pantai Pandawa">
                      <div class="card-body">
                          <p class="card-text">Kepulauan Derawan adalah sebuah kepulauan yang berada di Kabupaten Berau, Kalimantan Timur. Di kepulauan ini terdapat sejumlah objek wisata bahari menawan, salah satunya Taman Bawah Laut yang diminati wisatawan mancanegara terutama para penyelam kelas dunia. Kepulauan Derawan memiliki tiga kecamatan yaitu, Pulau Derawan, Maratua, dan Biduk Biduk, Berau.</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 mb-4">
                  <div class="card">
                      <img src="img/PantaiBenuaPatra1.jpg" class="card-img-top" alt="Pantai Pandawa">
                      <div class="card-body">
                          <p class="card-text">Pantai Banua Patra terletak di Balikpapan dulunya sering disebut dengan istilah Batu – Batu. Pasalnya, wilayahnya memang dipenuhi dengan bebatuan alam yang tersusun sampai membentuk pulau dipinggir pantai. Kontras yang terlihat dari pasir dan bebatuan inilah yang membuat Banua Patra berbeda dengan pantai lainnya. Bahkan batu yang terbentuk secara alami ini bisa dijadikan spot menarik untuk diabadikan.</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 mb-4">
                  <div class="card">
                      <img src="img/batudinding.jpg" class="card-img-top">
                      <div class="card-body">
                          <p class="card-text">Wisata Batu Dinding di Kutai Kartanegara (Kukar) menawarkan keindahan alam yang sangat memesona. Dengan dikelilingi hutan, Batu Dinding memanjakan mata lewat warna hijaunya yang masih asri. </p>
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="img/hutanmangrove1.jpg" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Hutan Mangrove Margomulyo menjadi salah satu destinasi wisata yang cukup popuker di Kota Balikpapan. Wisata ini memiliki berbagai macam daya tarik, salah satunya adalah karena tempat ini merupakan kawasan konservasi dan edukasi berkaitan dengan keanekaragaman flora dan fauna di Kalimantan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="img/pulaukakaban.jpg" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Pulau Kakaban yang merupakan pulau terluar di Kabupaten Berau, Kalimantan Timur, sungguh menarik untuk dikunjungi. Pulau yang luasannya didominasi danau hingga 80 persen ketimbang daratannya ini, dulunya berada dalam gugusan Pulau Derawan. Kini, wilayah seluas 774,2 hektar ini masuk Kecamatan Maratua, tepatnya di Kampung Payung-payung.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="img/pulaumaratua.jpg" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Pulau cantik yang berbatasan langsung dengan Filipina dan Sabah, Malaysia ini berlokasi di Kecamatan Maratua, Kabupaten Berau, Kalimantan Timur. Pulau ini ada di timur Pulau Kalimantan, selatan Pulau Tarakan dan di area lautan Sulawesi</p>
                        </div>
                    </div>
                </div>
          </div>
      </div>
  </section>
    <!-- Akhir rekomendasi wisata -->


    <!-- Formulir Input -->
<div id="input-form">
    <h2>Formulir Input</h2>
    <form id="myForm">
        <!-- Input Teks -->
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda"><br>

        <!-- Input Angka -->
        <label for="umur">Umur:</label>
        <input type="number" id="umur" name="umur" placeholder="Masukkan umur Anda"><br>

        <!-- Input Kata Sandi -->
        <label for="password">Kata Sandi:</label>
        <input type="password" id="password" name="password" placeholder="Masukkan kata sandi Anda"><br>

        <!-- Tombol Kirim -->
        <button type="submit">Kirim</button>
    </form>
</div>

<!-- Elemen untuk menampilkan hasil inputan -->
<div id="hasil"></div>

<script>
    // Mendapatkan referensi ke elemen formulir
    const form = document.getElementById("myForm");

    // Menangani pengiriman formulir
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Menghentikan pengiriman formulir standar

        // Mengambil nilai dari input
        const nama = document.getElementById("nama").value;
        const umur = document.getElementById("umur").value;
        const password = document.getElementById("password").value;

        // Menampilkan hasil inputan di dalam elemen "hasil"
        const hasilElemen = document.getElementById("hasil");
        hasilElemen.innerHTML = `
            <h2>Hasil Inputan:</h2>
            <p>Nama: ${nama}</p>
            <p>Umur: ${umur}</p>
            <p>Kata Sandi: ${password}</p>
        `;
    });

     // Tombol mode gelap/terang
     const modeToggle = document.getElementById("mode-toggle");
    const body = document.body;

    modeToggle.addEventListener("click", function() {
        body.classList.toggle("dark-mode");
    });
</script>


       <!-- Tombol Ganti Mode Gelap/Terang -->
<button id="mode-toggle" class="btn btn-primary">Mode Gelap</button>

<script>
  document.getElementById("mode-toggle").addEventListener("click", function() {
      let body = document.body;
      let button = document.getElementById("mode-toggle");

      if (body.classList.contains("light-mode")) {
          body.classList.remove("light-mode");
          body.classList.add("dark-mode");
          button.innerText = "Mode Terang";
      } else {
          body.classList.remove("dark-mode");
          body.classList.add("light-mode");
          button.innerText = "Mode Gelap";
      }
  });
   
</script>

    <!-- Footer -->
    <footer>
        <p>
            Created by <a href="https://instagram.com/hrsafitri?igshid=MzRlODBiNWFlZA==" class="text-white fw-bold">Hersa Safitri</a>
        </p>
    </footer>
      <!-- Akhir footer -->

  </body>
</html>