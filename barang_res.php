
<?php



include "kon.php";


$conn = sqlsrv_connect( $serverName, $connectionInfo);



if( $conn === false ) {


    echo "Koneksi Gagal</br>";


    die( print_r( sqlsrv_errors(), true));


}



$kd_brg = $_POST['kd_brg'];
$nm_brg = $_POST['nm_brg'];
$hrg     = $_POST['hrg'];
$stok     = $_POST['stok'];
$satuan     = $_POST['satuan'];



$tsql = "Insert into barang values('$kd_brg','$nm_brg','$hrg','$stok','$satuan')";


$stmt = sqlsrv_query( $conn, $tsql);



if( $stmt === false ) {


    echo "Error in executing query.</br>";


    die( print_r( sqlsrv_errors(), true));


}



header('location:index.php');



sqlsrv_free_stmt( $stmt);


sqlsrv_close( $conn);
?>