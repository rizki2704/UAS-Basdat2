<?php include_once('../_header.php'); ?>
<?php
include_once("../koneksi.php");
$result = mysqli_query($mysqli, "SELECT * FROM matkul");
?>

<html>
<head>    
    <title>Daftar Mata Kuliah</title>
</head>

<body>
<a href="addMatkul.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Mata Kuliah</a>
<div class="box">
    <h1>Mata Kuliah</h1>
    <h4>
        <small>Data Mata Kuliah</small>
    </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kode Mata Kuliah</th> 
                        <th>Nama Mata Kuliah</th> 
                        <th>SKS</th> 
                        <th>NIP Dosen</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>                  
                </thead>
                <?php  
                while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['KodeMK']."</td>";
                    echo "<td>".$user_data['NamaMK']."</td>";
                    echo "<td>".$user_data['sks']."</td>";    
                    echo "<td>".$user_data['NIP']."</td>";  
                    echo "<td><a href='editMatkul.php?KodeMK=$user_data[KodeMK]' class ='btn btn-warning btn-xs'><i class='glyphicon glyphicon-edit'></i></a> | 
                    <a href='deleteMatkul.php?KodeMK=$user_data[KodeMK]' class ='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a></td></tr>";        
                }
                ?>
            </table>
        </div>
</div>
</body>
</html>
<?php include_once('../_footer.php'); ?>