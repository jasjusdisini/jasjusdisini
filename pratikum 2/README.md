#   Tutorial MySQL ke JSON dan JSON ke Tabel HTML

Tutorial ini menunjukkan cara mengambil data dari database MySQL, mengubahnya ke format JSON, dan kemudian menampilkan data JSON tersebut dalam bentuk tabel HTML menggunakan PHP.

##   Persyaratan

* Sebuah web server dengan PHP (misalnya, XAMPP)
* Server database MySQL
* Pengetahuan dasar tentang PHP dan HTML

##   Pengaturan Database

1.  **Buat Database:**
    * Buat sebuah database dengan nama `json`.

2.  **Buat Tabel:**
    * Buat sebuah tabel dengan nama `wisata` dengan struktur berikut:

        Nama        |   Jenis    |   Panjang/Nilai
        :---        |   :---     |   :---
        id_wisata   |   INT      |   2 (Primary Key, Auto Increment)
        kota        |   VARCHAR  |   10
        landmark    |   VARCHAR  |   100
        tarif       |   VARCHAR  |   10

3.  **Masukkan Data:**
    * Isi tabel `wisata` dengan data berikut:

        KOTA        |   LANDMARK    |   TARIF
        :---        |   :---        |   :---
        SEMARANG    |   LAWANG SEWU |   20000
        YOGYAKARTA  |   PRAMBANAN   |   35000
        MAGELANG    |   BOROBUDUR   |   45000
        SURAKARTA   |   PGS         |   GRATIS

##   Skrip-Skrip

###   `getWisata.php`

* Skrip ini mengambil data dari tabel `wisata` di database `json` dan mengubahnya ke format JSON.
* Simpan file ini di dalam direktori bernama `json` di dalam direktori webroot Anda (misalnya, `c:\xampp\htdocs\json` atau `/var/www/html/json`).

```php
<?php

$connect = mysqli_connect("localhost", "root", "root", "json");
$sql = "SELECT * FROM wisata";
$result = mysqli_query($connect, $sql);
$json_array = array();
while($row = mysqli_fetch_assoc($result))
{
    $json_array[] = $row;
}
echo json_encode($json_array);

?>
Akses: http://localhost/json/getWisata.php
Output: Sebuah array JSON yang mewakili data dari tabel wisata.
tampilWisata.php
Skrip ini mengambil data JSON dari getWisata.php dan menampilkannya dalam tabel HTML.
Skrip ini menggunakan fungsi curl untuk mengambil data JSON dan json_decode untuk mengubahnya menjadi array PHP.
Simpan file ini di direktori json yang sama dengan getWisata.php.
PHP

<?php

function curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// alamat localhost untuk file getWisata.php, ambil hasil export JSON
$send = curl("http://localhost/json/getWisata.php");

// mengubah JSON menjadi array
$data = json_decode($send, TRUE);

// Membuat tabel HTML
echo "<table border='1'>";
echo "<tr><th>KOTA</th><th>LANDMARK</th><th>TARIF</th></tr>";

foreach($data as $row) {
    echo "<tr>";
    echo "<td>" . $row["kota"] . "</td>";
    echo "<td>" . $row["landmark"] . "</td>";
    echo "<td>" . $row["tarif"] . "</td>";
    echo "</tr>";
}

echo "</table>";

?>
Akses: http://localhost/json/tampilWisata.php
Output: Sebuah tabel HTML yang menampilkan data.
Contoh Output
Skrip tampilWisata.php akan menghasilkan tabel HTML seperti ini:

HTML

<table border="1">
  <tr>
    <th>KOTA</th>
    <th>LANDMARK</th>
    <th>TARIF</th>
  </tr>
  <tr>
    <td>SEMARANG</td>
    <td>LAWANG SEWU</td>
    <td>20000</td>
  </tr>
  <tr>
    <td>YOGYAKARTA</td>
    <td>PRAMBANAN</td>
    <td>35000</td>
  </tr>
  <tr>
    <td>MAGELANG</td>
    <td>BOROBUDUR</td>
    <td>45000</td>
  </tr>
  <tr>
    <td>SURAKARTA</td>
    <td>PGS</td>
    <td>GRATIS</td>
  </tr>
</table>
Yang akan ditampilkan di browser sebagai:

KOTA	LANDMARK	TARIF
SEMARANG	LAWANG SEWU	20000
YOGYAKARTA	PRAMBANAN	35000
MAGELANG	BOROBUDUR	45000
SURAKARTA	PGS	GRATIS
