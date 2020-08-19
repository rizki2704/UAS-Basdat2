<?php include_once('../_header.php'); ?>
<?php
include_once("../koneksi.php");

$kodeMK = $_GET["KodeMK"];

$result = mysqli_query($mysqli, "DELETE FROM matkul WHERE KodeMK=$kodeMK");

header("Location:matkul.php");
?>
<?php include_once('../_header.php'); ?>