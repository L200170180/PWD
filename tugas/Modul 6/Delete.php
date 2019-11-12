<?php
	$conn= mysqli_connect('localhost', 'root', '','tugas');
	
	$kodebuku = $_GET['Kode_Buku'];
	$hapus="delete from Buku where Kode_Buku = '$kodebuku'";
	$data=mysqli_query($conn,$hapus);
	
	if($data > 0){
		echo "
		<script>
		alert('data berhasil di hapus');
		document.location.href='Form_Tugas.php';
		</script>";
	}else
		echo "
		<script>
		alert('data gagal di hapus');
		document.location.href='Form_Tugas.php';
		</script>";
?>