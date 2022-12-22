<?php
include('config.php');

function registrasi($data){
    global $db;
    
    $nis = $data['nis'];
    $nama = $data['nama'];
    $JK = $data['JK'];
    $tlp = $data['tlp'];
    $alamat = $data['alamat'];
    $foto = uploadfoto();

    $query = "INSERT INTO SISWA VALUES('', '$nis', '$nama', '$JK', '$tlp', '$alamat', '$foto')";
    // var_dump($query);die;
    $result = mysqli_query($db, $query);
    return $result;
}

function uploadfoto(){
    $namaFile = $_FILES["foto"]["name"];
    $ukuranFile = $_FILES["foto"]["size"];
    $error = $_FILES["foto"]["error"];
    $tmpName = $_FILES["foto"]["tmp_name"];

    // cek apakah tidak ada file yang diupload
    if($error === 4){
        echo "<script>
               alert('pilih file pasfoto terlebih dahulu')
               </script>";
            return false;
        }

        // cek apakah yang diupload adalah file pdf
        $ekstensifilevalid = ['jpg','jpeg','png'];
        $ekstensifile = explode('.', $namaFile);
        $ekstensifile = strtolower(end($ekstensifile));

        //validasi ekstensi
        if(!in_array($ekstensifile, $ekstensifilevalid)){
            echo "<script>
                alert('format file pasfoto tidak sesuai, hanya menerima jpg, dan png')
                </script>";
            return false;
        }

        //cek ukuran file
        if($ukuranFile > 2000000){
            echo "<script>
                alert('ukuran file pasfoto melebihi kapasitas, hanya menerima 2MB')
                </script>";
            return false;
        }
        
        // lolos pengecekan
        $namaFileBaru = uniqid(); // rename file
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensifile;

        move_uploaded_file($tmpName, './img/' . $namaFileBaru);
        return($namaFileBaru);
}


?>