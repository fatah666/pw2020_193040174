<?php
// function untuk melakukan koneksi ke database
function koneksi()
{
  $conn = mysqli_connect("localhost", "root", "") or die("Koneksi ke DB Gagal");
  mysqli_select_db($conn, "tubes_193040174") or die("Database salah!");

  return $conn;
}

// function untuk melakukan query ke database
function query($sql)
{
  $conn = koneksi();
  $result = mysqli_query($conn, "$sql");

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $gambar = htmlspecialchars($data['gambar']);
  $nama = htmlspecialchars($data['nama']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $asaldaerah = htmlspecialchars($data['asal_daerah']);
  $carapemakaian = htmlspecialchars($data['cara_pemakaian']);
  $harga = htmlspecialchars($data['harga']);


  $query = "INSERT INTO
              alat musik
            VALUES
            ('', '$gambar', '$nama', '$deskripsi', '$asaldaerah', '$carapemakaian', '$harga');
  
  ";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
