<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<?php
session_start();
if($_SESSION['valid_user']!=true){
    header('Location: login.php');
    die();
}
?>

<?php


include "kon.php";
include "menu.php";


?>


<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Barang Masuk</h4>
					 <?php                                
					  $tgl    =date("Y-m-d");
                                    $tsql1 = "select sum(qty) as b from barangmasuk where tgl_bm='$tgl'";
                                    $stmt1 = sqlsrv_query( $conn, $tsql1);
                                    if( $stmt1 === false ) {
                                       echo "Error in executing query.</br>";
                                       die( print_r( sqlsrv_errors(), true));
                                    }

								?>
								  <?php 
                                        $no=0;
                                        $jumlah_desimal = "0";
                                        $pemisah_desimal = ",";
                                        $pemisah_ribuan = ".";
                                      
                                        while ($data1 = sqlsrv_fetch_array($stmt1)) {
                                            $no ++;
                                        
                                        
                                        
                                    ?>
						
						<h3><?php echo $data1['b']; ?></h3>
						<?php
						}
						?>
						<p>Inventory</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Customer</h4>
					<?php                                
					
                                    $tsql2 = "select count(cust_id) as c from pelanggan";
                                    $stmt2 = sqlsrv_query( $conn, $tsql2);
                                    if( $stmt2 === false ) {
                                       echo "Error in executing query.</br>";
                                       die( print_r( sqlsrv_errors(), true));
                                    }

								?>
								  <?php 
                                        $no=0;
                                        $jumlah_desimal = "0";
                                        $pemisah_desimal = ",";
                                        $pemisah_ribuan = ".";
                                      
                                        while ($data2 = sqlsrv_fetch_array($stmt2)) {
                                            $no ++;
                                        
                                        
                                        
                                    ?>
						
						<h3><?php echo $data2['c']; ?></h3>
						<p>
						<?php
if($data2['c'] == 0){
	echo "<p> Lakukan Promosi Sekarang</p>";
}
if($data2['c'] >=1 && $data2['c'] <= 10){
	echo "Tingkatkan Promosi Anda";
}if($data2['c'] >=11){
	echo "Good Job";
}
?>
</p>
						<?php
										}
										?>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Sales</h4>
						<?php                                
					  $tgl    =date("Y-m-d");
                                    $tsql = "select sum(total) as y from jual ";
                                    $stmt = sqlsrv_query( $conn, $tsql);
                                    if( $stmt === false ) {
                                       echo "Error in executing query.</br>";
                                       die( print_r( sqlsrv_errors(), true));
                                    }

								?>
								  <?php 
                                        $no=0;
                                        $jumlah_desimal = "0";
                                        $pemisah_desimal = ",";
                                        $pemisah_ribuan = ".";
                                      
                                        while ($data = sqlsrv_fetch_array($stmt)) {
                                            $no ++;
                                        
                                        
                                        
                                    ?>
						
						
						<h3><?php echo number_format($data['y'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?></h3>
<p>
<?php
if($data['y'] == 0){
	echo  "Lakukan Penjualan Sekarang";
}
if($data['y'] >= 1 && $data['y'] <= 1000000){
	echo "Tingkatkan Penjualan Anda";
}if($data['y'] >=  100001){
	echo "Good Job";
}
?>
</p>
						
						<?php 
                                        }
                                    
									?>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Best Seller</h4>
						<?php                                
					
                                    $tsql3 = "select TOP 1 kd_brg, sum(qty) as jml from detail group by kd_brg order by jml desc";
									$stmt3 = sqlsrv_query( $conn, $tsql3);
								
                                    if( $stmt3 === false ) {
                                       echo "Error in executing query.</br>";
                                       die( print_r( sqlsrv_errors(), true));
                                    }

								?>
								
										<?php                                
					$no=0;
					$jumlah_desimal = "0";
					$pemisah_desimal = ",";
					$pemisah_ribuan = ".";
				  
					while ($data3 = sqlsrv_fetch_array($stmt3)) {
						$no ++;
				
				?>
				<?php
				$a = $data3['kd_brg'];
				$tsql4 = "select * from barang where kd_brg='$a'";
				$stmt4 = sqlsrv_query( $conn, $tsql4);
			
				if( $stmt4 === false ) {
				   echo "Error in executing query.</br>";
				   die( print_r( sqlsrv_errors(), true));
				}


				?>
					<?php                                
					$no=0;
					$jumlah_desimal = "0";
					$pemisah_desimal = ",";
					$pemisah_ribuan = ".";
				  
					while ($data4 = sqlsrv_fetch_array($stmt4)) {
						$no ++;
				
				?>
						<h3><?php echo $data4['nm_brg']; ?></h3>
						<p>
ini adalah barang terlaris
</p>
						
						<?php 
                                        }
                                    
									?>
									
						<?php 
                                        }
                                    
									?>
									
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
				
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
