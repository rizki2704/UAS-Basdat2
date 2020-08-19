<?php include_once('../_header.php'); ?>
<?php
include_once("../koneksi.php");
$result = mysqli_query($mysqli, "SELECT * FROM khs");
?>

<html>
<head>    
    <title>Daftar Nilai</title>
</head>

<body>
<a href="addNilai.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Masukkan Nilai</a>
<div class="box">
    <h1>Nilai</h1>
    <h4>
        <small>Data Nilai</small>
    </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th> 
                        <th>NIM</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nilai</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>

                    </tr>                    
                </thead>
                <?php  
                 while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['idKhs']."</td>";
                    echo "<td>".$user_data['NIM']."</td>";
                    echo "<td>".$user_data['KodeMK']."</td>";    
                    echo "<td>".$user_data['nilai']."</td>";    
                    echo "<td><a href='editNilai.php?idKhs=$user_data[idKhs]' class ='btn btn-warning btn-xs'><i class='glyphicon glyphicon-edit'></i></a> | 
                    <a href='deleteNilai.php?idKhs=$user_data[idKhs]' class ='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a></td></tr>";        
                }
                ?>
            </table>
        </div>
</div>
    
</body>
</html>