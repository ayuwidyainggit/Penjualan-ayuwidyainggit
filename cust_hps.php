<?php
include "kon.php";
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
    echo "Koneksi Gagal</br>";
    die( print_r( sqlsrv_errors(), true));
}

$cust_id = $_GET['cust_id'];



$tsql2 = "delete from pelanggan    where cust_id='$cust_id'";
$stmt2 = sqlsrv_query( $conn, $tsql2);

if( $stmt2 === false ) {
    echo "<SCRIPT language=Javascript>
      alert('Maaf data tidak dapat dihapus karena data customer sedang digunakan.') 
      </script>
      <script>window.location='jual_i.php'</script>";

}
header('location:cust_i.php');
sqlsrv_free_stmt( $stmt);
sqlsrv_close( $conn);
?>