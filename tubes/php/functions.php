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

function upload()
{
  $nama_file = $_FILES['display']['name'];
  $tipe_file = $_FILES['display']['type'];
  $ukuran_file = $_FILES['display']['size'];
  $error = $_FILES['display']['error'];
  $tmp_file = $_FILES['display']['tmp_name'];

  // ketika tidak ada gambar yang dipilih 
  if ($error == 4) {
    // echo "<script>
    //       alert('pilih gambar terlebih dahulu');
    //       </script>";
    return 'non.png';
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
          alert('yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek tipe file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
          alert('yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek ukuran file
  // maksimal 5mb
  if ($ukuran_file > 5000000) {
    echo "<script>
          alert('ukuran terlalu besar !');
          </script>";
    return false;
  }

  // lolos pengecekan
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, '../assets/img/' . $nama_file_baru);

  return $nama_file_baru;
}

function tambah($data)
{
  $conn = koneksi();

  // $display = htmlspecialchars($data['display']);
  $nama = htmlspecialchars($data['nama']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $asal_daerah = htmlspecialchars($data['asal_daerah']);
  $cara_memainkan = htmlspecialchars($data['cara_memainkan']);
  $harga = htmlspecialchars($data['harga']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO
              alat_musik
            VALUES
            ('', '$gambar', '$nama', '$deskripsi', '$asal_daerah', '$cara_memainkan', '$harga');
  
  ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  // menghapus gambar difolder img
  $alat_musik = query("SELECT * FROM alat_musik WHERE id = $id")[0];
  if ($alat_musik['gambar'] != 'non.png') {
    unlink('../assets/img/' . $alat_musik['gambar']);
  }

  mysqli_query($conn, "DELETE FROM alat_musik WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $gambar_lama = htmlspecialchars($data['gambar_lama']);
  $nama = htmlspecialchars($data['nama']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $asal_daerah = htmlspecialchars($data['asal_daerah']);
  $cara_memainkan = htmlspecialchars($data['cara_memainkan']);
  $harga = htmlspecialchars($data['harga']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'non.png') {
    $gambar = $gambar_lama;
  }


  $query = "UPDATE
              alat_musik
            SET
            gambar = '$gambar',
						nama = '$nama',
						deskripsi = '$deskripsi',
						asal_daerah = '$asal_daerah',
            cara_memainkan = '$cara_memainkan',
						harga = '$harga'
						
						WHERE id = '$id'
						";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function registrasi($data)
{
  $conn = koneksi();
  $username = strtolower(stripcslashes($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  // jika username / pw kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
          alert('username / password tidak boleh kosong!');
          document.location.href = 'registrasi.php';
          </script>";
    return false;
  }

  // jika username sudah ada
  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
    alert('username sudah terdaftar');
    document.location.href = 'registrasi.php';
    </script>";
    return false;
  }

  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
          alert('konfirmasi password tidak sesuai!');
          document.location.href = 'registrasi.php';
          </script>";
    return false;
  }

  // jika password < 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
        alert('password terlalu pendek!');
        document.location.href = 'registrasi.php';
        </script>";
    return false;
  }

  // jika username & password sudah sesuai
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // insert ke tabel user
  $query = "INSERT INTO user
            VALUES
            (null, '$username', '$password_baru')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM alat_musik WHERE
                nama LIKE '%$keyword%' OR
                deskripsi LIKE '%$keyword%' OR
                asal_daerah LIKE '%$keyword%' OR
                cara_memainkan LIKE '%$keyword%' OR
                harga LIKE '%$keyword%' ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
  }

  return $rows;
}
