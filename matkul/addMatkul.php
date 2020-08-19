<?php include_once('../_header.php'); ?>
<html>
<head>
    <title>Add Users</title>
</head>

<body>
    <a href="matkul.php">Kembali</a>
    <br/><br/>

    <form action="addMatkul.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Kode Mata Kuliah</td>
                <td><input type="text" name="KodeMK" class="form-control" required></td>
            </tr>
            <tr> 
                <td>Nama Mata Kuliah</td>
                <td><input type="text" name="NamaMK" class="form-control" required></td>
            </tr>
            <tr> 
                <td>SKS</td>
                <td><input type="text" name="sks" class="form-control" required></td>
            </tr>
            <tr> 
                <td>Nama Dosen</td>
                <td>
		            <select name="NIP" id="NIP" class="form-control" required>
                    <option value="">-Pilih Dosen-</option>
			        <?php
                    include_once("koneksi.php");
                    $sql_dosen = mysqli_query($mysqli, "SELECT * FROM dosen") or die (mysqli_error($mysqli));
                    while($nip = mysqli_fetch_array($sql_dosen)){
                        echo '<option value="'.$nip['NIP'].'">'.$nip['NamaDosen'].'</option>';
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
        $kodeMK = $_POST['KodeMK'];
        $namaMK = $_POST['NamaMK'];
        $sks = $_POST['sks'];
        $nip = $_POST['NIP'];


        include_once("../koneksi.php");

        $result = mysqli_query($mysqli, "INSERT INTO matkul(KodeMK,NamaMK,sks,NIP) VALUES('$kodeMK','$namaMK','$sks','$nip')");

        echo "Mata Kuliah Berhasil Ditambahkan. <a href='matkul.php'>Lihat Mata Kuliah</a>";
    }
    ?>
</body>
</html>
<?php include_once('../_footer.php'); ?>