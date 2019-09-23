
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




$tsql = "Insert into pelanggan values('$cust_id','$nama','$no_telp','$alamat')";


$stmt = sqlsrv_query( $conn, $tsql);



if( $stmt === false ) {


    echo "Error in executing query.</br>";


    die( print_r( sqlsrv_errors(), true));


}



header('location:index.php');



sqlsrv_free_stmt( $stmt);


sqlsrv_close( $conn);
?>