<?php include_once('../_header.php'); ?>
<html>
<head>
    <title>Add Users</title>
</head>

<body>
    <a href="nilai.php">Kembali</a>
    <br/><br/>

    <form action="addNilai.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Mahasiswa</td>
                <td>
		            <select name="NIM" id="NIM" class="form-control" required>
                    <option value="">-Pilih Nama Mahasiswa-</option>
			        <?php
                    include_once("koneksi.php");
                    $sql_mhs = mysqli_query($mysqli, "SELECT * FROM mahasiswa") or die (mysqli_error($mysqli));
                    while($nim = mysqli_fetch_array($sql_mhs)){
                        echo '<option value="'.$nim['NIM'].'">'.$nim['NamaMhs'].'</option>';
                    }   
			        ?>
	            	</select>
		        </td>
            </tr>
            <tr> 
                <td>Nama Mata Kuliah</td>
                <td>
		            <select name="KodeMK" id="KodeMK" class="form-control" required>
                    <option value="">-Pilih Mata Kuliah-</option>
			        <?php
                    include_once("koneksi.php");
                    $sql_matkul = mysqli_query($mysqli, "SELECT * FROM matkul") or die (mysqli_error($mysqli));
                    while($kodeMK = mysqli_fetch_array($sql_matkul)){
                        echo '<option value="'.$kodeMK['KodeMK'].'">'.$kodeMK['NamaMK'].'</option>';
                    }   
			        ?>
	            	</select>
		        </td>
            </tr>
            <tr> 
                <td>Nilai</td>
                <td><input type="text" name="nilai" class="form-control" require></td>
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
        $kodeMK = $_POST['KodeMK'];
        $nilai = $_POST['nilai'];

        include_once("../koneksi.php");

        $result = mysqli_query($mysqli, "INSERT INTO khs(NIM,KodeMK,nilai) VALUES('$nim','$kodeMK','$nilai')");

        echo "Nilai Berhasil Ditambahkan. <a href='nilai.php'>Lihat Nilai</a>";
    }
    ?>
</body>
</html>
<?php include_once('../_footer.php'); ?>