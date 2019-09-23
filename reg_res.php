<?php

include "kon.php";
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
   echo "Koneksi Gagal</br>";
    die( print_r( sqlsrv_errors(), true));
}

  $id_user       = $_POST['id_user'];
  $nama       = $_POST['nama'];
  $username     = $_POST['username'];
  $passwordku     = $_POST['passwordku'];
  $jabatan     = $_POST['jabatan'];
  $pass       = MD5($passwordku);


$tsql = "Insert into userr values('$id_user','$nama','$username','$pass','$jabatan')";
$stmt = sqlsrv_query( $conn, $tsql);

if( $stmt === false ) {
    echo "Error in executing query.</br>";
    die( print_r( sqlsrv_errors(), true));
}

header('location:index.php');
sqlsrv_free_stmt( $stmt);
sqlsrv_close( $conn);
?>