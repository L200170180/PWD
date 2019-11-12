<?php
			$conn = mysqli_connect('localhost', 'root','','tugas');
			$kodebuku = $_GET['kode_buku'];
			$cari = "select * from buku where Kode_Buku = '$kodebuku'";
			$hasil_cari = mysqli_query($conn,$cari);
			$data = mysqli_fetch_array($hasil_cari);
			function active_radio_button($value,$input){
				$result = $value==$input? 'checked':'';
				return $result;
			}
			
			if($data > 0){
		
?>
<html>
	<head>
		<title>Data Buku</title>
	</head>				
			<body>
				<h3>FORM BUKU</h3>
				<table>
					<form method="POST" action="Update.php">
					<tr>
						<td>Kode Buku</td>
						<td>:</td>
						<td><input type="text" name="Kode_Buku" size="10" value="<?php echo $data['Kode_Buku']?>"></td>
					</tr>
					<tr>
						<td>Nama Buku</td>
						<td>:</td>
						<td><input type="text" name="Nama_Buku" size="30" value="<?=$data['Nama_Buku']?>"></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="UPDATE DATA"></td>
					</tr>
					</form>
				</table>
			<?php
			}
			?>
			</body>
	</html>