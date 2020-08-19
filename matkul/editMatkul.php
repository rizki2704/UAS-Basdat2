<?php include_once('../_header.php'); ?>
<?php
include_once("../koneksi.php");

if(isset($_POST['update']))
{   
    $kodeMK = $_POST['KodeMK'];

    $namaMK = $_POST['NamaMK'];
    $sks = $_POST['sks'];
    $nip = $_POST['NIP'];

    $result = mysqli_query($mysqli, "UPDATE matkul SET KodeMK='$kodeMK',NamaMK='$namaMK',sks='$sks',NIP='$nip' WHERE KodeMK='$kodeMK'");

    header("Location: matkul.php");
}
?>
<?php
$kodeMK = isset($_GET['KodeMK']) ? $_GET['KodeMK'] : '';

$result = mysqli_query($mysqli, "SELECT * FROM matkul WHERE KodeMK='$kodeMK'");

while($user_data = mysqli_fetch_array($result))
{
    $namaMK = $user_data['NamaMK'];
    $sks = $user_data['sks'];
    $nip= $user_data['NIP'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="matkul.php">Kembali</a>
    <br/><br/>

    <form name="update_user" method="post" action="editMatkul.php">
        <table border="0">
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
                <td><input type="hidden" name="KodeMK" value=<?php echo $kodeMK = isset($_GET['KodeMK']) ? $_GET['KodeMK'] : '';?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php include_once('../_header.php'); ?>