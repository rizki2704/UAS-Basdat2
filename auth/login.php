<?php
require_once "../koneksi.php";
if (isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url()."';</script>";
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Akademik</title>


    <link href="<?=base_url('_assets/css/bootstrap.min.css');?>" rel="stylesheet">


</head>

<body>

    <div id="wrapper">
        <div class="container">
            <div align="center"  style="margin-top : 210px;">
                <?php
                    if (isset($_POST['login'])) {
                        $user = trim(mysqli_real_escape_string($mysqli, $_POST['user']));
                        $pass = trim(mysqli_real_escape_string($mysqli, $_POST['pw']));
                        $sql_login = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '$user' AND pass='$pass'") or die (mysqli_error($mysqli));
                        if(mysqli_num_rows($sql_login)>0){
                            $_SESSION['user'] = $user;
                            echo "<script>window.location='".base_url()."';</script>";
                        }else{ ?>
                            <div class="row">
                                <div class="cil-lg-6 col-lg-offset-3">
                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <span class="glyphcon glyphcon-exclamation-sign" aria-hidden="true"></span>
                                        <strong>Login Gagal!</strong> Username / Password Salah
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                ?>

                <form action="" method="post" class="navbar-form">
                    <div class="input-grup">
                        <span class="input-grup-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="user" class="form-control" placeholder="Username" required autofocus> 
                    </div>
                    <div class="input-grup">
                        <span class="input-grup-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="pw" class="form-control" placeholder="Password" required> 
                    </div>
                    <div>
                        <input type="submit" name="login" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </div>

        </div>

    </div>
    <script src="<?=base_url('_assets/js/jquery.js');?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js');?>"></script>

</body>
</html>
<?php
}
?>