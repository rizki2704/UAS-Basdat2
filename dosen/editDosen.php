<?php include_once('../_header.php'); ?>
<?php
include_once("../koneksi.php");
if(isset($_POST['update']))
{   
    $nip = $_POST['NIP'];

    $namaDosen = $_POST['NamaDosen'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];

    $result = mysqli_query($mysqli, "UPDATE dosen SET NIP='$nip',NamaDosen='$namaDosen',alamat='$alamat',agama='$agama' WHERE NIP=$nip");

    header("Location: dosen.php");
}
?>
<?php
$nip = isset($_GET['NIP']) ? $_GET['NIP'] : '';

$result = mysqli_query($mysqli, "SELECT * FROM dosen WHERE NIP=$nip");

while($user_data = mysqli_fetch_array($result))
{
    $namaDosen = $user_data['NamaDosen'];
    $alamat = $user_data['alamat'];
    $agama= $user_data['agama'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="dosen.php">Kembali</a>
    <br/><br/>

    <form name="update_user" method="post" action="editDosen.php">
        <table border="0">
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
                <td><input type="hidden" name="NIP" value=<?php echo $nip = isset($_GET['NIP']) ? $_GET['NIP'] : '';?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php include_once('../_footer.php'); ?>