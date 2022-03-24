<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>

    <div class="login">
        <div class="avatar">
            <i class="fa fa-user"></i>
        </div>

        <h2>Login Form</h2>

        <form method="post" action="">
            <div class="box-login">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="username" name="username">
            </div>

            <div class="box-login">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="password" name="password">
            </div>
            <button type="submit" class="btn-login" value="login">Login</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            if ($user == '' || $pass == '') {
                echo "Form belum lengkap!!";
            } else {
                $con = mysqli_connect("localhost", "root", "", "pembayaran_spp");
                $sqlLogin = mysqli_query($con, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
                $jml = mysqli_num_rows($sqlLogin);
                $d = mysqli_fetch_array($sqlLogin);
                if ($jml > 0) {
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['id']    = $d['idadmin'];
                    $_SESSION['username'] = $d['username'];

                    header('location:./spp.php');
                } else {
                    echo "Usename dan Password anda salah!!";
                }
            }
        }
        ?>
    </div>

</body>

</html>