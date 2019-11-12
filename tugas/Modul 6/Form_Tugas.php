<html>
    <head>
        <title>Data Buku</title>
    </head>
    
	<?php
        $conn=mysqli_connect('localhost','root','','tugas');
    ?>
    
	<body>
        <center>
            <h3>Masukan Data Buku :</h3>
            <table border='0' width='30%'>
                <form method='post' action='Form_Tugas.php'>
                    <tr>
                        <td width='25%'>Kode Buku</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type='text' name='Kode_Buku' size='10'></td>
                    </tr>
                    <tr>
                        <td width='25%'>Nama Buku</td>
                        <td width='5%'>:</td>
                        <td width='65%'><input type='text' name='Nama_Buku' size='30'></td>
                    </tr>
                    <tr>
                        <td width='25%'>Kode Jenis</td>
                        <td width='5%'>:</td>
                        <td width='65%'>
                        <select name = "Kode_Jenis">
                        <?php
                                $sql = "select * from Buku";
                                $retval = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($retval)){
                                    echo "<option value='$row[Kode_Jenis]'>$row[Nama_Jenis]</option>";
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
            </table>
                    <input type='submit' value='Masukan' name='submit'>
                </form>
               
    <?php
        error_reporting(E_ALL ^ E_NOTICE);
        $kodebuku = $_POST['Kode_Buku'];
        $namabuku = $_POST['Nama_Buku'];
        $kodejenis = $_POST['Kode_Jenis'];
        $submit = $_POST['submit'];
        $input = "insert into Buku(Kode_Buku, Nama_Buku, Kode_Jenis) values ('$kodebuku', '$namabuku', '$kodejenis')";
        if($submit){
            mysqli_query($conn, $input);
            echo "Data Berhasil dimasukkan";
        }
    ?>

    <hr>
    <h3>Data Buku</h3>
        <table border='1' width='50%'>
            <tr>
                <td align='center' width='20%'><b>Kode Buku</b></td>
                <td align='center' width='30%'><b>Nama Buku</b></td>
                <td align='center' width='10%'><b>Nama Jenis</b></td>
                <td align='center' width='30%'><b>Keterangan Jenis</b></td>
                <td colspan= 2 align='center' width='30%'><b>Keterangan</b></td>
            </tr>
           
    <?php
        $cari = "select Buku.Kode_Buku, Buku.Nama_Buku, Jenis_Buku.Nama_Jenis, Jenis_Buku.Keterangan_Jenis 
		from Buku join Jenis_Buku on Buku.Kode_Jenis = Jenis_Buku.Kode_Jenis";
        $hasil_cari = mysqli_query($conn,$cari);
        while ($data = mysqli_fetch_row($hasil_cari)){
        echo"
            <tr>
                <td width='20%'>$data[0]</td>
                <td width='30%'>$data[1]</td>
                <td width='10%'>$data[2]</td>
                <td width='30%'>$data[3]</td>
                <td><a href='update_form.php?Kode_Buku=$data[0]'>Ubah</a></td>
                <td><a href='delete.php?Kode_Buku=$data[0]'>Hapus</a></td>
            </tr>";
        }
    ?>
     
        </table>
        </center>
    </body>
</html>