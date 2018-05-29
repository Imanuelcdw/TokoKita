<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Struk</title>
	<!-- <link rel="stylesheet" href="mains.css"> -->
</head>
<script>
	window.print();
</script>
<style>
	*{
		font-family: consolas;
	}
	th{
		font-size: 20px;
	}
	
</style>

<body>
	<h1>TokoKita</h1>
	<?php 
		$con = mysqli_connect('localhost','root','','db_tokokita');
	    $kd = $_GET['id'];
		$sql = "SELECT * FROM tbl_transaksi2 WHERE kd_transaksi = '$kd'";
		$query = mysqli_query($con, $sql);
		if ($data = mysqli_fetch_array($query)) { ?>
			
		<table>
			<tr>
				<td>Kode Transaksi</td>
				<td>:</td>
				<td><?= $data['0'] ?></td>
			</tr>
			<tr>
				<td>Tgl/Waktu Transaksi</td>
				<td>:</td>
				<td><?= $data['4'] ?></td>
			</tr>
		</table><hr>
	<?php } ?>
	<table width="100%" border="1" cellpadding="3" cellspacing="0">
		<thead>
			<tr>
				<th><h5>No</h5></th>
				<th><h5>Barang</h5></th>
				<th><h5>Qty</h5></th>
				<th><h5>Harga</h5></th>
			</tr>
		</thead>
		<tbody>
			<?php 
				
				$sql = "SELECT * FROM transaksi WHERE kd_transaksi = '$kd'";
				$query = mysqli_query($con, $sql);
				$no = 1;
				while ($data = mysqli_fetch_array($query)) { ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $data['1'] ?></td>
					<td><?= $data['2'] ?></td>
					<td><?= "Rp.".number_format($data['3']) ?></td>
				</tr>
			<?php } ?>	
				<tr>
					<td colspan="4"></td>
				</tr>
			<?php
				$sql = "SELECT * FROM tbl_transaksi2 WHERE kd_transaksi = '$kd'";
				$query = mysqli_query($con, $sql); 
				if ($data = mysqli_fetch_array($query)) { ?>
					<tr>
						<td align="right" colspan="3"><b>Total Harga :</b></td>
						<td><b><?= "Rp.".number_format($data['1']) ?></b></td>
					</tr>
					<tr>
						<td align="right" colspan="3"><b>Bayar :</b></td>
						<td><b><?= "Rp.".number_format($data['2']) ?></b></td>
					</tr>
					<tr>
						<td align="right" colspan="3"><b>Kembalian :</b></td>
						<td><b><?= "Rp.".number_format($data['3']) ?></b></td>
					</tr>
				<?php } ?>
			
		
		</tbody>
	</table>
</body>
</html>