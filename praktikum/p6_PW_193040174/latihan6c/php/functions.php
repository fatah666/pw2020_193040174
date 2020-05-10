<?php
// function untuk melakukan koneksi ke database
function koneksi()
{
  $conn = mysqli_connect("localhost", "root", "") or die("Koneksi ke DB Gagal");
  mysqli_select_db($conn, "pw_193040174") or die("Database salah!");

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
  $caramemainkan = htmlspecialchars($data['cara_memainkan']);
  $harga = htmlspecialchars($data['harga']);


  $query = "INSERT INTO
              alat_musik
            VALUES
            ('', '$gambar', '$nama', '$deskripsi', '$asaldaerah', '$caramemainkan', '$harga');
  
  ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM alat_musik WHERE id = $id");

  return mysqli_affected_rows($conn);
}
