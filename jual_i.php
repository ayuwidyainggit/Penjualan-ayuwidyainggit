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
include_once "session.php";

include "kon.php";
include "menu.php";

$sql = "SELECT max(no_bukti) FROM jual";
    $query = sqlsrv_query( $conn, $sql);
 
    $kode_faktur = sqlsrv_fetch_array($query);
 
    if($kode_faktur){
        $nilai = substr($kode_faktur[0], 1);
        $kode = (int) $nilai;
 
        //tambahkan sebanyak + 1
        $kode = $kode + 1;
        $auto_kode = "J" .str_pad($kode, 2, "0",  STR_PAD_LEFT);
    } else {
        $auto_kode = "J01";
    }

    
 

?>
<?php

$cust = "SELECT * FROM pelanggan";
$cust_query = sqlsrv_query( $conn, $cust);

?>


<script>
function hitung() {
        var qty=(document.getElementById("qty").value);
        var harga=parseInt(document.getElementById("hrg").value); 
        var total = qty * harga;        
        document.getElementById('jumlah').value = total;
 if (isNaN(qty)){ 
        document.getElementById('hrg').value = harga;                                 
 }
 if (isNaN(harga)){ 
        document.getElementById('qty').value = qty;                                 
 }
 if ((isNaN(qty))&&(isNaN(harga))){ 
        document.getElementById('jumlah').value = 0;                                 
 }

   }    
</script>

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
                <div class="panel-body">
                <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                  Tambah
                </button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Data Toko</h4>
                            </div>
                            <div class="modal-body">
                              
                              <form action="jual_sementara.php" method="POST">

                                <div class="form-group">
                                    <label>No Bukti</label>
                                    <input type="text" class="form-control" value ="<?php echo $auto_kode?>" name="no_bukti" readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <?php   
                         include "kon.php"; 
                      ?> 
                            <select name="kd_brg" id="kd_brg" class="form-control" onchange='changeValue(this.value)' required >  
                              <option>pilih</option>
                          <?php   

 
                          $query = sqlsrv_query($conn, "select * from barang ");  
                          $result = sqlsrv_query($conn, "select * from barang ");  
                          $a          = "var hrg = new Array();\n;"; 
                           $b         = "var stok = new Array();\n;";  
                         
                          while ($row = sqlsrv_fetch_array($result)) {  
                               echo '<option name="nm_brg" value="'.$row['kd_brg'] . '">' . $row['nm_brg'] . '</option>';   
                          $a .= "hrg['" . $row['kd_brg'] . "'] = {hrg:'" . addslashes($row['hrg'])."'};\n"; 
                           $b.= "stok['" . $row['kd_brg'] . "'] = {stok:'" . addslashes($row['stok'])."'};\n";  
                         
                          }  

                          ?>  
                     </select>

                                 <div class="form-group">
                                    <label>Harga</label>
                                   <input type="text" class="form-control" name="hrg" id="hrg" readonly="readonly" onkeyup="hitung()">
                                </div>
                                 <div class="form-group">
                                    <label>Stok</label>
                                   <input type="text" class="form-control" name="stok" id="stok" readonly="readonly" >
                                </div>
                                    <div class="form-group">
                                    <label>Jual </label>
                                       <input type="text" class="form-control"  name="qty"  id="qty" placeholder="Stok" required onkeyup="hitung()">
                                    </div>
                                    <div class="form-group">
                                    <label>Total</label>
                                   <input type="number" class="form-control" name="jumlah" id="jumlah" readonly="readonly">
                                </div>                             
                             

                             
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <input type="submit" name="tambahdata" value="Tambah Data"class="btn btn-primary">
                            </div>
                           </form>


							</div>
	
	 
                    </div>

				</div>

	      </div>

 <div class="panel panel-default">
    
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
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            PENJUALAN
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                            <form action="jual_res.php" method="POST">    
                                <form role="form">
                                
                                <div class="form-group">
                                    <label>No Bukti</label>
                                    <input type="text" class="form-control" value ="<?php echo $auto_kode?>" name="no_bukti" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control" value ="" name="tgl" require="">
                                </div>
                                <div class="form-group">
                                    <label>Customer</label>
                                   
                                    <?php   
                         include "kon.php"; 
                      ?> 
                            <select name="cust_id" id="cust_id" class="form-control" onchange='changeValue(this.value)' required >  
                              <option>pilih</option>
                          <?php   

 
                          $query = sqlsrv_query($conn, "select * from pelanggan ");  
                          $result = sqlsrv_query($conn, "select * from pelanggan ");  
                       
                          while ($row = sqlsrv_fetch_array($result)) {  
                               echo '<option name="nm_brg" value="'.$row['cust_id'] . '">' . $row['nama'] . '</option>';   
                      
                          }  

                          ?>  
                     </select>
                                </div>
                            
                                <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <input type="submit" name="tambahdata1" value="Tambah Data"class="btn btn-primary">
                            </div>
                           

                            <tr class="success" style="text-align: center;">
                              <th>Id Jual</th>
                              <th>Nama Barang</th>
                              <th>qty</th>
                              <th>Harga</th>
                              <th>Jumlah</th>
                               
                          
                            </tr>
<?php
error_reporting(0); 
?>
                              <?php foreach ($_SESSION["cart"] as $key => $value){?>
                              <tr>
                                <td><?=$value['no_bukti']?></td>
                                <td><?=$value['nm_brg']?></td>
                                <td><?=$value['qty']?></td>
                                <td><?=number_format($value['hrg'])?></td>
                                <td><?=number_format($value['jumlah'])?></td>
                              

                              
                                
                              </tr>
                               <?php }?>

                               <?php
                        $sum =0;
                        if(isset($_SESSION["cart"]))
                        {
                          foreach ($_SESSION["cart"] as $key => $value){
                            $sum += $value['jumlah'];
                          }
                        }
                        ?>
                        <tr>
                              <td colspan="4">Total :</td>
                              <td><?=number_format($sum)?></td>
                            </tr>
                            </table>
                          </div>
                        
<input type="number" name="total" value="<?=$sum?>">
                               </form>
                            </div>

                        </div>
                    </section>
  
                              
            </div>
          
 
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
   <script type="text/javascript">   
                          <?php   
                          echo $a; 
                          echo $b;   
                          ; ?>  
                          function changeValue(kd_brg){  
                            document.getElementById('hrg').value = hrg[kd_brg].hrg;  
                            document.getElementById('stok').value = stok[kd_brg].stok;  
                            
                          };  
                          </script> 
	<!-- //calendar -->
</body>
</html>
