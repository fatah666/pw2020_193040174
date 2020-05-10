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

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $gambar = htmlspecialchars($data['gambar']);
  $nama = htmlspecialchars($data['nama']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $asaldaerah = htmlspecialchars($data['asal_daerah']);
  $caramemainkan = htmlspecialchars($data['cara_memainkan']);
  $harga = htmlspecialchars($data['harga']);


  $query = "UPDATE
              alat_musik
            SET
            gambar = '$gambar',
						nama = '$nama',
            deskripsi = '$deskripsi',
						asal_daerah = '$asaldaerah',
						cara_memainkan = '$caramemainkan',
						harga = '$harga'
						
						WHERE id = '$id'
						";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
function registrasi($data)
{
  $conn = koneksi();
  $username = strtolower(stripslashes($data['username']));
  $password = mysqli_real_escape_string($conn, $data['password']);

  // cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('username sudah digunakan!');
          </script>";
    return false;
  }
  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambah user baru 
  $query_tambah = "INSERT INTO user 
                  VALUES
                  ('', '$username', '$password')";
  mysqli_query($conn, $query_tambah);

  return mysqli_affected_rows($conn);
}
