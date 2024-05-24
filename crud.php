<?php
include 'koneksi.php';


//CREATE
if (isset($_POST['simpan'])) {

    //persiapan simpan 
    $simpan = mysqli_query($koneksi, "INSERT INTO mhs(nim, nama, alamat, jurusan) 
                                    VALUES ('$_POST[nim]',
                                    '$_POST[nama]',
                                    '$_POST[alamat]',
                                    '$_POST[jurusan]')");
    if ($simpan == true) {
        header("Location: index.php");
        exit();
    } else {
        echo "error: " . $simpan;
    }
}

//edit
if (isset($_POST['ubah'])) {

    //persiapan simpan 
    $ubah = mysqli_query($koneksi, "UPDATE mhs SET nim ='$_POST[nim]', nama ='$_POST[nama]', alamat ='$_POST[alamat]', jurusan ='$_POST[jurusan]' WHERE id_mhs='$_POST[id_mhs]' ");
    if ($ubah == true) {
        header("Location: index.php");
        exit();
    } else {
        echo "error: " . $ubah;
    }
}

//hapus
if (isset($_GET['hapus'])) {

    //persiapan simpan 
    $hapus = mysqli_query($koneksi, "DELETE FROM mhs WHERE id_mhs='$_GET[id_mhs]' ");
    if ($hapus === true) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $hapus;
    }
}
