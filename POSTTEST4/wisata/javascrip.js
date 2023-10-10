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
        <div class="hasil-info">
            <p><strong>Nama:</strong> ${nama}</p>
            <p><strong>Umur:</strong> ${umur}</p>
            <p><strong>Kata Sandi:</strong> ${password}</p>
        </div>
    `;
});
