<?php

function curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// Ambil data JSON dari getWisata.php
$send = curl("http://localhost/json/getWisata.php");

// Ubah JSON menjadi array PHP
$data = json_decode($send, TRUE);

// Mulai membuat tabel HTML
echo "<table border='1'>"; // Membuat tabel dengan garis tepi
echo "<tr><th>KOTA</th><th>LANDMARK</th><th>TARIF</th></tr>"; // Membuat baris judul tabel

// Loop untuk setiap baris data
foreach($data as $row) {
    echo "<tr>";
    echo "<td>" . $row["kota"] . "</td>"; // Menampilkan data kota
    echo "<td>" . $row["landmark"] . "</td>"; // Menampilkan data landmark
    echo "<td>" . $row["tarif"] . "</td>"; // Menampilkan data tarif
    echo "</tr>";
}

echo "</table>"; // Menutup tag tabel

?>