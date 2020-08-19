<?php include_once('../_header.php'); ?>
<html>
<head>
    <title>Add Users</title>
</head>

<body>
    <a href="mahasiswa.php">Kembali</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>NIM</td>
                <td><input type="text" name="NIM" class="form-control" required></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="NamaMhs" class="form-control" required></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" class="form-control"></td>
            </tr>
            <tr> 
                <td>Jenis Kelamin</td>
                <td><input type="text" name="JenisKelamin" class="form-control" placeholder="L/P"></td>
            </tr>
            <tr> 
                <td>Agama</td>
                <td><input type="text" name="agama" class="form-control"></td>
            </tr>
            <tr> 
                <td>Kode Jurusan</td>
                <td>
		            <select name="KodeJurusan" id="KodeJurusan" class="form-control" required>
                    <option value="">-Pilih Kode Jurusan-</option>
			        <?php
                    include_once("koneksi.php");
                    $sql_jurusan = mysqli_query($mysqli, "SELECT * FROM jurusan") or die (mysqli_error($mysqli));
                    while($kodeJurusan = mysqli_fetch_array($sql_jurusan)){
                        echo '<option value="'.$kodeJurusan['KodeJurusan'].'">'.$kodeJurusan['KodeJurusan'].'</option>';
                    }   
			        ?>
	            	</select>
		        </td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    if(isset($_POST['Submit'])) {
        $nim = $_POST['NIM'];
        $namaMhs = $_POST['NamaMhs'];
        $alamat = $_POST['alamat'];
        $jenisKelamin = $_POST['JenisKelamin'];
        $agama = $_POST['agama'];
        $kodeJurusan = $_POST['KodeJurusan'];


        include_once("../koneksi.php");

        $result = mysqli_query($mysqli, "INSERT INTO mahasiswa(NIM,NamaMhs,alamat,JenisKelamin,agama,KodeJurusan) VALUES('$nim','$namaMhs','$alamat','$jenisKelamin','$agama','$kodeJurusan')");

        echo "Mahasiswa Berhasil Ditambahkan. <a href='mahasiswa.php'>Lihat Mahasiswa</a>";
    }
    ?>
</body>
</html>
<?php include_once('../_footer.php'); ?>