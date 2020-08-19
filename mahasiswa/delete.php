<?php include_once('../_header.php'); ?>
<?php
include_once("../koneksi.php");

$nim = $_GET['NIM'];

$result = mysqli_query($mysqli, "DELETE FROM mahasiswa WHERE NIM=$nim");

header("Location:mahasiswa.php");
?>
<?php include_once('../_footer.php'); ?>