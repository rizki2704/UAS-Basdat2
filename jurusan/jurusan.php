<?php include_once('../_header.php'); ?>
<?php
include_once("../koneksi.php");
$result = mysqli_query($mysqli, "SELECT * FROM jurusan");
?>

<html>
<head>    
    <title>Daftar Jurusan</title>
</head>

<body>
<a href="addJurusan.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Jurusan</a>
<div class="box">
    <h1>Jurusan</h1>
    <h4>
        <small>Data Jurusan</small>
    </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kode Jurusan</th> 
                        <th>Nama Jurusan</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>

                    </tr>                    
                </thead>
                <?php  
                while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['KodeJurusan']."</td>";
                    echo "<td>".$user_data['NamaJurusan']."</td>";    
                    echo "<td><a href='editJurusan.php?KodeJurusan=$user_data[KodeJurusan]' class ='btn btn-warning btn-xs'><i class='glyphicon glyphicon-edit'></i></a> | 
                    <a href='deleteJurusan.php?KodeJurusan=$user_data[KodeJurusan]' class ='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a></td></tr>";     
                }
                ?>
            </table>
        </div>
</div> 
</body>
</html>
<?php include_once('../_footer.php'); ?>