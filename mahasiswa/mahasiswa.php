<?php include_once('../_header.php'); ?>
<?php
include_once("../koneksi.php");
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa");
?>

<html>
<head>    
    <title>Daftar Mahasiswa</title>
</head>

<body>
<a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Mahasiswa</a>
<div class="box">
    <h1>Mahasiswa</h1>
    <h4>
        <small>Data Mahasiswa</small>
    </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NIM</th> 
                        <th>Nama</th> 
                        <th>Alamat</th> 
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Kode Jurusan</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>

                    </tr>                    
                </thead>
                <?php  
                 while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['NIM']."</td>";
                    echo "<td>".$user_data['NamaMhs']."</td>";
                    echo "<td>".$user_data['alamat']."</td>";    
                    echo "<td>".$user_data['JenisKelamin']."</td>";    
                    echo "<td>".$user_data['agama']."</td>";    
                    echo "<td>".$user_data['KodeJurusan']."</td>";    
                    echo "<td><a href='edit.php?NIM=$user_data[NIM]' class ='btn btn-warning btn-xs'><i class='glyphicon glyphicon-edit'></i></a> | 
                    <a href='delete.php?NIM=$user_data[NIM]' class ='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a></td></tr>";     
                }
                ?>
            </table>
        </div>
</div>
</body>
</html>