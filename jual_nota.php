<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
    <?php

include "kon.php";
include "menu.php";


$no_bukti = $_GET['no_bukti']; 
    $sql = "SELECT * FROM jual j join  pelanggan p  on  (p.cust_id=j.cust_id)";
    $query = sqlsrv_query( $conn, $sql);
    $data = sqlsrv_fetch_array($query);
 
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
								</div>
					</div>
					<div class="clearfix"> </div>
				</div>
</section>
   <div class="content">
<div class="women_main">
                						</div>
	
	 
                    </div>

				</div>
                <?php                                
                                    $tsql = "
                                    SELECT * FROM jual j join  pelanggan p  on  (p.cust_id=j.cust_id) 
                                    join detail d on (j.no_bukti=d.no_bukti) 
                                    join barang b on(b.kd_brg=d.kd_brg) where j.no_bukti='$no_bukti'";
                                    $stmt = sqlsrv_query( $conn, $tsql);
                                    if( $stmt === false ) {
                                       echo "Error in executing query.</br>";
                                       die( print_r( sqlsrv_errors(), true));
                                    }

                                ?>
          
 <div class="panel panel-default">
    <div class="panel-heading">
     NOTA PENJUALAN
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
        <tr>
            <td colspan="4">TUJUAN : <?php echo $data['nama']; ?></td>
            <td>NO Pengiriman : <?php echo $data['no_bukti']; ?></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td><?php echo date_format($data['tgl'], "Y-m-d");  ?></td>
        </tr>
          <tr>
            <th data-breakpoints="xs">ID</th>
            <th>Nama Barang</th>
            <th>Kuantitas</th>
            <th>Harga Jual</th>
            <th>Total</th>
           
          </tr>
        </thead>


                        </thead>
                        <tbody>
                        <?php 
                                        $no=0;
                                        $jumlah_desimal = "0";
                                        $pemisah_desimal = ",";
                                        $pemisah_ribuan = ".";
                                      
                                        while ($data1 = sqlsrv_fetch_array($stmt)) {
                                            $no ++;
                                        
                                        
                                        
                                    ?>
                                            <tr>
                                            <td><?php echo $no; ?></td>
                                                <td><?php echo $data1['nm_brg']; ?></td>
                                                <td><?php echo $data1['qty']; ?></td>
                                                
                                                 <td>Rp <?php echo number_format($data1['hrg'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?></td>
                                                 <td>Rp <?php echo number_format($data1['jumlah'], $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan); ?></td>
												
                                            </tr>
                                    <?php 
                                        }
                                    
                                    ?>
                                  
                        </tbody>
                      </table>
                      <!-- LAPORAN END -->
				 <!-- LAPORAN -->
	      </div>

                              
            </div>
          
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
