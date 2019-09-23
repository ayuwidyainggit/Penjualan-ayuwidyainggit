
<?php



include "kon.php";


$conn = sqlsrv_connect( $serverName, $connectionInfo);



if( $conn === false ) {


    echo "Koneksi Gagal</br>";


    die( print_r( sqlsrv_errors(), true));


}



$no_bm = $_POST['no_bm'];
$tgl_bm = $_POST['tgl_bm'];
$kd_brg     = $_POST['kd_brg'];
$qty     = $_POST['qty'];




$tsql = "Insert into barangmasuk values('$no_bm','$tgl_bm','$kd_brg','$qty')";


$stmt = sqlsrv_query( $conn, $tsql);



if( $stmt === false ) {


    echo "Error in executing query.</br>";


    die( print_r( sqlsrv_errors(), true));


}

$tsql2 = "update  barang  set stok = stok +'$qty' where kd_brg='$kd_brg'";
$stmt2 = sqlsrv_query( $conn, $tsql2);


header('location:barangmasuk_i.php');



sqlsrv_free_stmt( $stmt);


sqlsrv_close( $conn);
?>