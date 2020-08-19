<?php include_once('../_header.php'); ?>
<?php
include_once("koneksi.php");
$nip = $_GET['NIP'];
$result = mysqli_query($mysqli, "DELETE FROM dosen WHERE NIP=$nip");
header("Location:dosen.php");
?>
<?php include_once('../_footer.php'); ?>