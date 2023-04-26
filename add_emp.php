<html>
    <head>
        <title>Tambah Karyawan</title>
    </head>

    <body style="display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 100vh;">
        <h1 style="text-decoration: underline;">Tambah Karyawan</h1>
        <form action="add_emp.php" method="post" name="submit_emp">
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
                <tr> 
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr> 
                    <td>Telepon</td>
                    <td>:</td>
                    <td><input type="number" name="telepon"></td>
                </tr>
                <tr> 
                    <td>Alamat</td>
                    <td>:</td>
                    <td><textarea rows="5" name="alamat"></textarea></td>
                </tr>
                <tr> 
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="kelamin" value="Pria">Pria
                        <input type="radio" name="kelamin" value="Wanita">Wanita
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" name="submit" value="Tambah"></td>
            <button type="button"><a href="admin.php" style="text-decoration: none; color: black;">Cancel</a></button>
        </form>
        
        <?php
            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $nama = $_POST['nama'];
                $telepon = $_POST['telepon'];
                $alamat = $_POST['alamat'];
                $kelamin = $_POST['kelamin'];
                include_once("config.php");
                try {
                    $result = mysqli_query($mysqli, "INSERT INTO users(username,password,nama,telepon,alamat,kelamin,tipe) VALUES('$username','$password','$nama','$telepon','$alamat','$kelamin','employee')");
                    if($result) {
                        header("Location: admin.php");
                    }
                } catch (mysqli_sql_exception $exception) {
                    if ($exception->getCode() == 1062) {
                        echo "<script>alert('Error: Duplicate entry for username');</script>";
                    } else {
                        echo "<script>alert('Error: " . $exception->getMessage() . "');</script>";
                    }
                }
            }
        ?>
    </body>
</html>