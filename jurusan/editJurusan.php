<?php include_once('../_header.php'); ?>
<?php
include_once("../koneksi.php");

if(isset($_POST['update']))
{   
    $kodeJurusan = $_POST['KodeJurusan'];

    $namaJurusan = $_POST['NamaJurusan'];

    $result = mysqli_query($mysqli, "UPDATE jurusan SET KodeJurusan='$kodeJurusan', NamaJurusan='$namaJurusan' WHERE KodeJurusan=$kodeJurusan");

    header("Location: jurusan.php");
}
?>
<?php

$kodeJurusan = isset($_GET['KodeJurusan']) ? $_GET['KodeJurusan'] : '';

$result = mysqli_query($mysqli, "SELECT * FROM jurusan WHERE KodeJurusan=$kodeJurusan");

while($user_data = mysqli_fetch_array($result))
{
    $kodeJurusan = $user_data['KodeJurusan'];
    $namaJurusan = $user_data['NamaJurusan'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="jurusan.php">Kembali</a>
    <br/><br/>

    <form name="update_user" method="post" action="editJurusan.php">
        <table border="0">
            <tr> 
                <td>Kode Jurusan</td>
                <td><input type="text" name="KodeJurusan" class="form-control" required></td>
            </tr>
            <tr> 
                <td>Nama Jurusan</td>
                <td><input type="text" name="NamaJurusan" class="form-control" required></td>
            </tr>
            <tr>
                <td><input type="hidden" name="KodeJurusan" value=<?php echo $kodeJurusan = isset($_GET['KodeJurusan']) ? $_GET['KodeJurusan'] : '';?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php include_once('../_footer.php'); ?>