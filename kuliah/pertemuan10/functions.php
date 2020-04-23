<?php

function  koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'pw_193040174');
}

function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

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
  $nrp = htmlspecialchars($data['nrp']);
  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);

  $query = "INSERT INTO
              mahasiswa
              values
              (null, '$gambar', '$nrp', '$nama', '$email', '$jurusan');
          ";
  mysqli_query($conn, $query);

  echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
}
