<?php
    include '../koneksi.php';
    $id = $_GET['id'];
    mysqli_query($koneksi, "delete from pelanggan where id_pelanggan='$id'");
    header("location:pelanggan.php");
?>