<?php
	$conn= mysqli_connect('localhost', 'root', '','tugas');
	
	$kodebuku=$_POST['kode_Buku'];
	$namabuku=$_POST['Nama_Buku'];
	$submit=$_POST['submit'];
	$update="UPDATE Buku set Kode_Buku ='$kodebuku', Nama_Buku ='$namabuku' WHERE Kode_Buku ='$kodebuku' ";
	
	if($submit){
		mysqli_query($conn,$update);
		echo "
		<script>
		alert('data berhasil di update');
		document.location.href='Form_Tugas.php';
		</script>";
		}	
?>