
<?php
include "kon.php";
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
    echo "Koneksi Gagal</br>";
    die( print_r( sqlsrv_errors(), true));
}

$cust_id = $_POST['cust_id'];
$nama = $_POST['nama'];
$no_telp     = $_POST['no_telp'];
$alamat     = $_POST['alamat'];


$tsql2 = "update  pelanggan  set nama = '$nama', no_telp = '$no_telp', alamat='$alamat'  where cust_id='$cust_id'";
$stmt2 = sqlsrv_query( $conn, $tsql2);

if( $stmt2 === false ) {
    echo "Error in executing query.</br>";
    die( print_r( sqlsrv_errors(), true));
}
header('location:index.php');
sqlsrv_free_stmt( $stmt);
sqlsrv_close( $conn);
?>