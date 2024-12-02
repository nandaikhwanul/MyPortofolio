<?php
header('Access-Control-Allow-Methods: POST, GET');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['name'];
    $telepon = $_POST['phone']; 
    $email = $_POST['email'];
    $pesan = $_POST['message'];

    // Menyiapkan header email
    $ke = "nanda.nadlirin@gmail.com";
    $subjek = "Pesan Baru dari Website Portfolio";
    
    // Menyusun isi pesan
    $isi_pesan = "Nama: " . $nama . "\n";
    $isi_pesan .= "Telepon: " . $telepon . "\n";
    $isi_pesan .= "Email: " . $email . "\n\n";
    $isi_pesan .= "Pesan:\n" . $pesan;

    // Header tambahan
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Mengirim email
    if(mail($ke, $subjek, $isi_pesan, $headers)) {
        echo "<script>
                alert('Pesan berhasil dikirim!');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "<script>
                alert('Maaf, terjadi kesalahan saat mengirim pesan.');
                window.location.href = 'index.html';
              </script>";
    }
}
?>
