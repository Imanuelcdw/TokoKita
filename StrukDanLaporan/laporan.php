<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan</title>
	<script>
		// window.print()
	</script>
</head>
<style>
	*{
		font-family: consolas
	}
	th{
		font-size: 20px
	}
</style>
<body>
	<h1 align="center">TokoKita</h1>
	<p align="center">Jl.RayaCimandeEdan Notelp : 085255590966</p>
	<p align="center"><b>Laporan Pejualan TokoKita Bulan <?php
		$tgl = date('M'); 
		switch ($tgl) {
			case 'January':
				echo "Januari";
				break;
			case 'February':
				echo "Februari";
				break;
			case 'March':
				echo "Maret";
				break;
			case 'April':
				echo "April";
				break;			
			case 'May':
				echo "Mei";
				break;
			case 'June':
				echo "Juni";				
				break;
			case 'July':
				echo "Juli";				
				break;
			case 'August':
				echo "Agustus";				
				break;
			case 'September':
				echo "September";				
				break;
			case 'October':
				echo "Oktober";				
				break;
			case 'Novembar':
				echo "November";				
				break;
			case 'December':
				echo "Desember";				
				break;							
			default:
				# code...
				break;
		}
	 ?></b></p><hr>
	<table width="100%" border="1" cellpadding="3" cellspacing="0">
		<thead>
			<tr>
				<th><h5>No</h5></th>

				<th><h5>Tanggal</h5></th>
				<th><h5>Kode Transaksi</h5></th>
				<th><h5>Barang</h5></th>
				<th><h5>Qty</h5></th>
				<th><h5>Harga</h5></th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$con = mysqli_connect('localhost','root','','db_tokokita');
				$date = date('m');
				$sql = "SELECT * FROM transaksi WHERE month(tgl) = '$date'";
				$query = mysqli_query($con, $sql);
				$no = 1;

				if (mysqli_num_rows($query) > 0) {
					while ($data = mysqli_fetch_array($query)) { ?>
					<tr>
						<td><?= $no++ ?></td>

						<td><?= date('d-m-Y', strtotime($data['4'])); ?></td>
						<td><?= $data['0'] ?></td>
						<td><?= $data['1'] ?></td>
						<td align="center"><?= $data['2'] ?></td>
						<td align="right"><?= "Rp.".number_format($data['3']) ?></td>
					</tr>
					
				<?php } ?>
					
			<?php }else{ ?>
					<tr>
						<td colspan="6"><h4 align="center">Tidak Ada Transaksi Bulan ini</h4></td>
					</tr>
			<?php }  ?>
					<tr>	
						<td colspan="6"></td>
					</tr>
			<?php 	
				$sql = "SELECT SUM(harga) FROM transaksi";
				$query = mysqli_query($con, $sql);
				if ($data2 = mysqli_fetch_array($query)) { ?>
					<tr>
						<td colspan="5" align="right">Total Pejualan</td>
						<td align="right"><?= "Rp.".number_format($data2['0']) ?></td>
					</tr>		
			<?php }  ?>
					
		</tbody>
	</table>
</body>
</html>