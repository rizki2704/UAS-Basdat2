<?php include_once('../_header.php'); ?>
<?php

include_once("../koneksi.php");

$kodeJurusan = $_GET['KodeJurusan'];

$result = mysqli_query($mysqli, "DELETE FROM jurusan WHERE KodeJurusan=$kodeJurusan");

header("Location:jurusan.php");
?>
<?php include_once('../_header.php'); ?>