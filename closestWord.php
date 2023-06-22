<?php


function getClosestWord($keyword)
{
    include 'koneksi.php';

    // Escape keyword untuk mencegah SQL Injection
    $escapedKeyword = $conn->real_escape_string($keyword);

    // Query untuk mencari kata terdekat dari keyword di database
    $sql = "SELECT kata FROM database_kata_terdekat WHERE keyword = '$escapedKeyword' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Jika kata terdekat ditemukan, kembalikan kata tersebut
        $row = $result->fetch_assoc();
        return $row['kata'];
    } else {
        // Jika kata terdekat tidak ditemukan, kembalikan string kosong
        return '';
    }
}