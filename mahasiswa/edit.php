<?php include_once('../_header.php'); ?>
<?php
include_once("../koneksi.php");

if(isset($_POST['update']))
{   
    $nim = $_POST['NIM'];

    $namaMhs = $_POST['NamaMhs'];
    $alamat = $_POST['alamat'];
    $jenisKelamin = $_POST['JenisKelamin'];
    $agama = $_POST['agama'];
    $kodeJurusan = $_POST['KodeJurusan'];

    $result = mysqli_query($mysqli, "UPDATE mahasiswa SET NIM='$nim',NamaMhs='$namaMhs',alamat='$alamat',JenisKelamin='$jenisKelamin',agama='$agama',KodeJurusan='$kodeJurusan' WHERE NIM=$nim");

    header("Location: mahasiswa.php");
}
?>
<?php
$nim = isset($_GET['NIM']) ? $_GET['NIM'] : '';


$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE NIM=$nim");

while($user_data = mysqli_fetch_array($result))
{
    $nim = $user_data['NIM'];
    $namaMhs = $user_data['NamaMhs'];
    $alamat = $user_data['alamat'];
    $jenisKelamin = $user_data['JenisKelamin'];
    $agama= $user_data['agama'];
    $kodeJurusan = $user_data['KodeJurusan'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="mahasiswa.php">Kembali</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
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
                <td><select name="KodeJurusan" id="KodeJurusan" class="form-control" required>
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
                <td><input type="hidden" name="NIM" value=<?php echo $nim = isset($_GET['NIM']) ? $_GET['NIM'] : '';?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php include_once('../_footer.php'); ?>