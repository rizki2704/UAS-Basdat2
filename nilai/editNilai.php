<?php include_once('../_header.php'); ?>
<?php
include_once("../koneksi.php");

if(isset($_POST['update']))
{   
    $id = $_POST['idKhs'];

    $nim = $_POST['NIM'];
    $kodeMK = $_POST['KodeMK'];
    $nilai = $_POST['nilai'];

    $result = mysqli_query($mysqli, "UPDATE khs SET idKhs='$id',NIM='$nim',KodeMK='$kodeMK',nilai='$nilai' WHERE idKhs=$id");

    header("Location: nilai.php");
}
?>
<?php
$id = isset($_GET['idKhs']) ? $_GET['idKhs'] : '';

$result = mysqli_query($mysqli, "SELECT * FROM khs WHERE idKhs=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nim = $user_data['NIM'];
    $kodeMK = $user_data['KodeMK'];
    $nilai = $user_data['nilai'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="nilai.php">Kembali</a>
    <br/><br/>

    <form name="update_user" method="post" action="editNilai.php">
        <table border="0">
            <tr> 
                <td>Nama Mahasiswa</td>
                <td><select name="NIM" id="NIM" class="form-control" required>
                    <option value="">-Pilih Mahasiswa-</option>
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
                <td>Mata Kuliah</td>
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
                <td><input type="text" name="nilai" required></td>
            </tr>
            <tr>
                <td><input type="hidden" name="idKhs" value=<?php echo $id = isset($_GET['idKhs']) ? $_GET['idKhs'] : '';?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php include_once('../_footer.php'); ?>