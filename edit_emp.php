<?php
    include_once("config.php");
    if(isset($_POST['update']))
    {	
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $alamat = $_POST['alamat'];
        $kelamin = $_POST['kelamin'];
        $result  =  mysqli_query($mysqli, "UPDATE users SET username='$username',password='$password',nama='$nama',telepon='$telepon',alamat='$alamat',kelamin='$kelamin',tipe='employee' WHERE id=$id");
        header("Location: admin.php");
    }
?>

<?php
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
    while($user_data = mysqli_fetch_array($result))
    {
        $username = $user_data['username'];
        $password = $user_data['password'];
        $nama = $user_data['nama'];
        $telepon = $user_data['telepon'];
        $alamat = $user_data['alamat'];
        $kelamin = $user_data['kelamin'];
    }
?>

<html>
    <head>	
        <title>Edit Data Karyawan</title>
    </head>

    <body style="display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 100vh;">
    <h1 style="text-decoration: underline;">Edit Data Karyawan</h1>
        <form action="edit_emp.php" method="post" name="update_employee">
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" value=<?php echo $username;?> name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" value=<?php echo $password;?> name="password"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" value=<?php echo $nama;?> name="nama"></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td><input type="number" value=<?php echo $telepon;?> name="telepon"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><textarea rows="5" name="alamat"><?php echo $alamat;?></textarea></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="kelamin" value="Pria" <?php if($kelamin=='Pria') echo 'checked="checked"';?>>Pria
                        <input type="radio" name="kelamin" value="Wanita" <?php if($kelamin=='Wanita') echo 'checked="checked"';?>>Wanita
                    </td>
                </tr>
            </table>
            <br>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Perbarui"></td>
            <td><button type="button"><a href="admin.php" style="text-decoration: none; color: black;">Cancel</a></button></td>
        </form>
    </body>
</html>