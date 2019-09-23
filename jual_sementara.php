 <?php 
include 'kon.php';
session_start();

$id = $_POST['no_detail'];
$no_detail      = $_POST['no_detail'];
$no_bukti     = $_POST['no_bukti'];
$kd_brg     = $_POST['kd_brg'];
$jumlah     = $_POST['jumlah'];
$qty     = $_POST['qty'];
$stok     = $_POST['stok'];
$hrg     = $_POST['hrg'];


                         
      
 if ($_POST['qty'] > $_POST['stok']){
      echo "<SCRIPT language=Javascript>
          alert('Maaf Stok Produk yang tersedia tidak mencukupi, Silahkan Ulangi Pengisian Form Penjualan') 
          </script>
          <script>window.location='jual_i.php'</script>";

    exit;
          } else {

	
		}

		


if (isset($_POST['kd_brg']))
{
	$kd_brg = $_POST['kd_brg'];
	$no_bukti = $_POST['no_bukti'];
	$hrg = $_POST['hrg'];
	$qty = $_POST['qty'];
	$jumlah = $_POST['jumlah'];
	

$sql = "SELECT * FROM barang WHERE kd_brg='$kd_brg'";
    $query = sqlsrv_query( $conn, $sql);
 
    $b = sqlsrv_fetch_array($query);
	
	
	$kirim = [
		'kd_brg' => $kd_brg,
		'no_bukti' => $no_bukti,
		'nm_brg' => $b['nm_brg'],
		'hrg' => $hrg,
		'qty' => $qty,
		'jumlah' => $jumlah,
		
	];
	
	$_SESSION["cart"][]=$kirim;
	krsort($_SESSION['cart']);
	header('location:jual_i.php');
}



header("location:jual_i.php");

 ?>