<?php 
    $con = mysqli_connect("localhost","root","","karyawan_kel2");
    if(mysqli_connect_errno()){
        echo "Koneksi gagal: " . mysqli_connect_error();
    }
?>