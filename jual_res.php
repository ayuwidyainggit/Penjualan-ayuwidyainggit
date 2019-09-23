<?php

require "kon.php";
session_start();

if (isset($_POST['tambahdata1'])) {
  $no_bukti    = $_POST['no_bukti']; 
  $tgl    = $_POST['tgl']; 
  $cust_id    = $_POST['cust_id']; 
  
  $total = $_POST['total'];
 


      




$tsql = "Insert into jual values('$no_bukti','$cust_id','$tgl', '$total')";
$stmt = sqlsrv_query( $conn, $tsql);

if( $stmt === false ) {
    echo "Error in executing query.</br>";
    die( print_r( sqlsrv_errors(), true));
}



// $id_kirim=sqlsrv_insert_id($conn);

//insert ke detail pembelian
foreach ($_SESSION['cart'] as $key => $value){
    $no_bukti = $value['no_bukti'];
  $kd_brg = $value['kd_brg'];
  $qty = $value['qty'];
  $harga = $value['harga'];
  $jumlah = $value['jumlah'];
 

$tsql1 = "Insert into detail  values('$no_bukti','$kd_brg','$qty', '$jumlah')";
$stmt1 = sqlsrv_query( $conn, $tsql1);

if( $stmt1 === false ) {
    echo "Error in executing query.</br>";
    die( print_r( sqlsrv_errors(), true));
}


$tsql2 = "update  barang  set stok = stok -'$qty' where kd_brg='$kd_brg'";
$stmt2 = sqlsrv_query( $conn, $tsql2);

header('location:reset.php');

      }}

 ?>
 