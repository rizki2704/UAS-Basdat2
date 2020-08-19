<?php include_once('../_header.php'); ?>
<?php

include_once("../koneksi.php");

$id = $_GET['idKhs'];

$result = mysqli_query($mysqli, "DELETE FROM khs WHERE idKhs=$id");

header("Location:nilai.php");
?>
<?php include_once('../_footer.php'); ?>