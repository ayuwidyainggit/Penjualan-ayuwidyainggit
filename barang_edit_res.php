
<?php
include "kon.php";
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
    echo "Koneksi Gagal</br>";
    die( print_r( sqlsrv_errors(), true));
}

$kd_brg = $_POST['kd_brg'];
$nm_brg = $_POST['nm_brg'];
$satuan     = $_POST['satuan'];


$tsql2 = "update  barang  set nm_brg = '$nm_brg', satuan = '$satuan'where kd_brg='$kd_brg'";
$stmt2 = sqlsrv_query( $conn, $tsql2);

if( $stmt2 === false ) {
    echo "Error in executing query.</br>";
    die( print_r( sqlsrv_errors(), true));
}
header('location:barang_i.php');
sqlsrv_free_stmt( $stmt);
sqlsrv_close( $conn);
?>