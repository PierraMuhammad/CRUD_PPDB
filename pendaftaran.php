<?php
session_start();
require 'functions.php';

if(isset($_POST["submit"])){
    // var_dump($_FILES);die;
    if(registrasi($_POST) > 0){
        echo "<script>Peserta berhasil didaftarkan</script>";
    }
    else{
        mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Siswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nis">NIS</label><br>
        <input type="text" name="nis"><br><br>
        <label for="nama">Nama</label><br>
        <input type="text" name="nama"><br><br>
        <label for="">Jenis Kelamin</label><br>
        <select name="JK" id="JK">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>
        <label for="tlp">No. Telepon</label><br>
        <input type="text" name="tlp"><br><br>
        <label for="alamat">Alamat</label><br>
        <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea><br><br>
        <label for="foto">Foto</label><br>
        <input type="file" name="foto" id="foto"><br><br>
        <button type="submit" name="submit">daftar</button>
    </form>
</body>
</html>