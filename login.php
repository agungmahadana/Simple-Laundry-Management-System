<?php
    session_start();
    include_once("config.php");

    $err = "";

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == '' or $password == '') {
            $err .= "Username atau password tidak boleh kosong.";
        } else {
            $q1 = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username'");
            $r1 = mysqli_fetch_array($q1);
            if (!$r1) {
                $err .= "Username tidak terdaftar.";
            } else if ($r1['password'] != md5($password)) {
                $err .= "Password salah.";
            }

            if (empty($err)) {
                $_SESSION['session_username'] = $username;
                $_SESSION['session_tipe'] = $r1['tipe'];
                if ($r1['tipe'] == 'admin') {
                    header("Location: admin.php");
                } else {
                    header("Location: employee.php");
                }
                exit();
            }
        }
    }
?>

<html>
    <head>
        <title>Login</title>
    </head>

    <body style="display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 100vh;">
        <h1 style="text-decoration: underline;">Login</h1>
        <form action="login.php" method="post" name="form_login">
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password"></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="login" value="Login"></td>
        </form>
        <?php if (!empty($err)): ?>
            <script>alert("<?php echo $err; ?>");</script>
        <?php endif; ?>
    </body>
</html>