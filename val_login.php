<?php
session_start();


include "kon.php";
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
   echo "Koneksi Gagal</br>";
    die( print_r( sqlsrv_errors(), true));
}


$username = $_POST['username'];
$passwordku  = $_POST['passwordku'];
$tsql = "SELECT * FROM userr WHERE username='$username' AND passwordku='$passwordku'";
$stmt = sqlsrv_query( $conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
if($stmt == true){
    $_SESSION['valid_user'] = true;
	$_SESSION['username'] = $username;
	
    header('Location: index.php');
    die();
}else{
    header('Location: 404.html');
    die();
}
?>
