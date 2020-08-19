<?php include_once('../_header.php'); ?>
<html>
<head>
    <title>Tambah Dosen</title>
</head>

<body>
    <a href="dosen.php">Kembali</a>
    <br/><br/>

    <form action="addDosen.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>NIP</td>
                <td><input type="text" name="NIP" class="form-control" required></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="NamaDosen" class="form-control" required></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" class="form-control"></td>
            </tr>
            <tr> 
                <td>Agama</td>
                <td><input type="text" name="agama" class="form-control"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    if(isset($_POST['Submit'])) {
        $nip = $_POST['NIP'];
        $namaDosen = $_POST['NamaDosen'];
        $alamat = $_POST['alamat'];
        $agama = $_POST['agama'];

        include_once("../koneksi.php");

        $result = mysqli_query($mysqli, "INSERT INTO dosen(NIP,NamaDosen,alamat,agama) VALUES('$nip','$namaDosen','$alamat','$agama')");

        echo "Dosen berhasil ditambahkan. <a href='dosen.php'>Lihat Dosen</a>";
    }
    ?>
</body>
</html>
<?php include_once('../_footer.php'); ?>