<?php include_once('../_header.php'); ?>
<html>
<head>
    <title>Add Users</title>
</head>

<body>
    <a href="Jurusan.php">Kembali</a>
    <br/><br/>

    <form action="addJurusan.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Kode Jurusan</td>
                <td><input type="text" name="KodeJurusan" class="form-control" required></td>
            </tr>
            <tr> 
                <td>Nama Jurusan</td>
                <td><input type="text" name="NamaJurusan" class="form-control" required></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    if(isset($_POST['Submit'])) {
        $kodeJurusan = $_POST['KodeJurusan'];
        $namaJurusan = $_POST['NamaJurusan'];

        include_once("../koneksi.php");

        $result = mysqli_query($mysqli, "INSERT INTO jurusan(KodeJurusan,NamaJurusan) VALUES('$kodeJurusan','$namaJurusan')");

        echo "Jurusan Berhasil Ditambahkan. <a href='jurusan.php'>Lihat Jurusan</a>";
    }
    ?>
</body>
</html>
<?php include_once('../_footer.php'); ?>