<?php include_once('../_header.php'); ?>
<?php
include_once("../koneksi.php");
$result = mysqli_query($mysqli, "SELECT * FROM dosen");
?>

<html>
<head>    
    <title>Daftar Dosen</title>
</head>

<body>
<a href="addDosen.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Dosen</a>
<div class="box">
    <h1>Dosen</h1>
    <h4>
        <small>Data Dosen</small>
    </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>NIP</th> 
                        <th>Nama</th> 
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>                  
                </thead>
                <?php  
                while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['NIP']."</td>";
                    echo "<td>".$user_data['NamaDosen']."</td>";
                    echo "<td>".$user_data['alamat']."</td>";   
                    echo "<td>".$user_data['agama']."</td>";    
                    echo "<td><a href='editDosen.php?NIP=$user_data[NIP]' class ='btn btn-warning btn-xs'><i class='glyphicon glyphicon-edit'></i></a> | 
                    <a href='deleteDosen.php?NIP=$user_data[NIP]' class ='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a></td></tr>";      
                }
                ?>
            </table>
        </div>
</div>
</body>
</html>
<?php include_once('../_footer.php'); ?>