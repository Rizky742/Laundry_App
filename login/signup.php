<!doctype html>
<html lang="en">

<head>
    <title>LaundryApp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">

</head>

<body>
    <?php
    include "../connection/koneksi.php";
    $qry_get_user = mysqli_query($conn, "select * from tb_user");
    $dt_user = mysqli_fetch_array($qry_get_user);
    ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">LaundryApp</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(../images/bg-1.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign Up</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="proses_singup.php" method="POST" class="signin-form">
                                <div class="form-group mt-3">
                                    <input type="text" name="name" class="form-control" required>
                                    <label class="form-control-placeholder" for="name">Name</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" required>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" name="password" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <select name="outlet" class="custom-select" required>
                                        <?php
                                        include "../connection/koneksi.php";
                                        $qry_get_outlet = mysqli_query($conn, "select * from tb_outlet");
                                        while($dt_outlet = mysqli_fetch_array($qry_get_outlet)) {
                                            if($dt_outlet['id']==$dt_user['id_outlet']) {
                                                $selek = "selected";
                                            }else{
                                                $selek = "";
                                            }
                                            echo '<option value="'.$dt_outlet['id'].'" '.$selek.'>'.$dt_outlet['nama'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="role" class="custom-select" required>
                                        <option value="admin">admin</option>
                                        <option value="kasir">kasir</option>
                                        <option value="user">user</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary rounded submit px-3" value="Sign Up">
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center">Have an account? <a href="login.php">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

</body>

</html>