<?php
require_once('auth.php');
?>

<link href="style.css" media="screen" rel="stylesheet" type="text/css" />


<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<a href="javascript:Clickheretoprint()" style="font-size:20px";>ปริ้น</a>|<a href="home.php" style="font-size:20px";>กลับ</a>
<?php
@ini_set('display_errors', '0');
$invoice=$_GET['invoice'];
$transactionid =$_GET['transaction_id'];
include('connect.php');
$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$cname=$row['name'];
$invoice=$row['invoice_number'];
$date=$row['date'];
$cash=$row['due_date'];
$cashier=$row['cashier'];
$transaction=$row['transaction_id'];
$pt=$row['type'];
$am=$row['amount'];
if($pt=='cash'){
$cash=$row['cash'];
$amount=$cash-$am;
}
}
?><br>
<br>

<div class="content" id="content">
<div  style="margin: 0 auto; padding: 20px; width: 700px; font-weight: normal;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 459px; float: left;">
	<p>J Shop</p>
	โรงเรียนอนุบาลจำเนียรวิทยา<br />
					 ต.แม่ใส่ อ.เมืองพะเยา จังหวัด พะเยา 56000<br>
					เบอร์โทรติดต่อ:054-427-252<br>
					</p>
	<div>
	<?php
	$resulta = $db->prepare("SELECT * FROM customer WHERE customer_name= :a");
	$resulta->bindParam(':a', $cname);
	$resulta->execute();
	for($i=0; $rowa = $resulta->fetch(); $i++){
	$address=$rowa['address'];
	$contact=$rowa['contact'];
	}
	?>
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">
		<tr>
			<td width="25%">ซื่อสมาชิก : </td>
			<td width="75%"><?php echo $cname ?></td>
		</tr>
		<tr>
			<td width="25%">ที่อยู่ : </td>
			<td width="75%"><?php echo $address ?></td>
		</tr>
		<tr>
			<td width="25%">ติดต่อ : </td>
			<td width="75%"><?php echo $contact ?></td>
		</tr>
	</table>
	</div>
	</div>
	<div style="width: 236px; float: right; height: 178px;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">
		<tr>
			<td colspan="2"><div style="text-align: center; font-weight: bold;">
			
			<?php
			if($pt=='cash'){
			echo 'จ่ายด้วยเงินสด:';
			}
			if($pt=='credit'){
			echo 'จ่ายด้วยการโอน:';
			}
			?>
			</div></td>
		</tr>
		<tr>
			<td>หมายเลขออเดอร์</td>
			<td>JSH-<?php echo $transaction ?></td>
		</tr>
		<tr>
			<td>วันที่</td>
			<td><?php echo $date ?></td>
		</tr>
		
	</table>
				<table border="1" cellpadding="1" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">
				<tr style="height: 109px; vertical-align: top;">
			<td>ตราประทับ/ลายเซ็น</td>
			
		</tr>
		</table>
	</div>
	<div class="clearfix"></div>
	</div>
	<div style="width: 100%">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;" width="100%">
		<thead>
			<tr>
				<th> รหัสสินค้า </th>
				<th> ชื่อสินค้า </th>
				<th> จำนวน </th>
				<th> ราคา </th>
				<th> ส่วนลด </th>
				<th> รวมทั้งสิ้น </th>
			</tr>
		</thead>
		<tbody>
			
				<?php
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
				?>
				<tr class="record">
				<td><?php echo $row['product']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['qty']; ?></td>
				<td>
				<?php
				$ppp=$row['price'];
				echo formatMoney($ppp, true);
				?>
				</td>
				<td>
				<?php
				$ddd=$row['discount'];
				echo formatMoney($ddd, true);
				?>
				</td>
				<td>
				<?php
				$dfdf=$row['amount'];
				$tta= $row['qty']* $row['price'];
				echo formatMoney($tta, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td colspan="5"><strong style="font-size: 12px; color: #222222;">ราคารวมที่ต้องจ่าย:</strong></td>
					<td colspan="2"><strong style="font-size: 12px; color: #222222;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT amount,qty,sum(amount*qty) AS TT
					FROM sales_order  WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $rowas = $resultas->fetch(); $i++){
					$fgfg=$rowas['sum(amount)'];
					$summamount=$rowas['TT'];
					echo formatMoney($summamount, true);
					}
					?>
					</strong></td>
				</tr>
				<?php if($pt=='cash'){
				?>
				<tr>
					<td colspan="5"><strong style="font-size: 12px; color: #222222;">รับเงินมา:</strong></td>
					<td colspan="2"><strong style="font-size: 12px; color: #222222;">
					<?php
					echo formatMoney($cash, true);
					?>
					</strong></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="5"><strong style="font-size: 12px; color: #222222;">
					<?php
					if($pt=='cash'){
					echo 'เงินทอน:';
					}
					if($pt=='credit'){
					echo 'วันที่จ่าย:';
					}
					?>
					</strong></td>
					<td colspan="2"><strong style="font-size: 12px; color: #222222;">
					<?php
					function formatMoney($number, $fractional=false) {
						if ($fractional) {
							$number = sprintf('%.2f', $number);
						}
						while (true) {
							$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
							if ($replaced != $number) {
								$number = $replaced;
							} else {
								break;
							}
						}
						return $number;
					}
					if($pt=='credit'){
					echo $cash;
					}
					if($pt=='cash'){
					echo formatMoney($amount, true);
					}
					?>
					</strong></td>
				</tr>
			
		</tbody>
	</table>
	</div>
	
<div style="text-align: right; margin-top: 13px;">ชื่อผู้ขาย : <?php echo $cashier ?></div>
</div>
</div>


