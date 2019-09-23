<?php
include "kon.php";
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
    echo "Koneksi Gagal</br>";
    die( print_r( sqlsrv_errors(), true));
}

$kd_brg = $_GET['kd_brg'];



$tsql2 = "delete from barang    where kd_brg='$kd_brg'";
$stmt2 = sqlsrv_query( $conn, $tsql2);

if( $stmt2 === false ) {
    echo "<SCRIPT language=Javascript>
      alert('Maaf data tidak dapat dihapus karena data customer sedang digunakan.') 
      </script>
      <script>window.location='jual_i.php'</script>";

}
header('location:barang_i.php');
sqlsrv_free_stmt( $stmt);
sqlsrv_close( $conn);
?>