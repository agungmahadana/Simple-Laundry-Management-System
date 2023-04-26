<?php
    include_once("config.php");

    session_start();

    if (!isset($_SESSION['session_username']) || $_SESSION['session_tipe'] != 'admin') {
        header("Location: login.php");
        exit();
    }

    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE tipe != 'admin' ORDER BY id DESC");
?>

<html>
    <head>
        <title>Data Karyawan</title>
    </head>

    <body style="display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 100vh;">
        <h1 style="text-decoration: underline;">Data Karyawan</h1>
        <?php if(mysqli_num_rows($result) > 0): ?>
            <table width="80%" border=1>
                <div style="width: 80%; display: flex; margin-bottom: 10px;">
                    <button type="button"><a href="logout.php" style="text-decoration: none; color: black;">Logout</a></button>
                    <div style="flex-grow: 1;"></div>
                    <button type="button"><a href="add_emp.php" style="text-decoration: none; color: black;">Tambah Karyawan</a></button>
                <div>
                <tr>
                    <th>Username</th> <th>Password</th> <th>Nama</th> <th>Telepon</th> <th>Alamat</th> <th>Jenis Kelamin</th> <th></th>
                </tr>
                <?php
                    while($user_data = mysqli_fetch_array($result)) {         
                        echo "<tr>";
                        echo "<td>".$user_data['username']."</td>";
                        echo "<td>".$user_data['password']."</td>";
                        echo "<td>".$user_data['nama']."</td>";
                        echo "<td>".$user_data['telepon']."</td>";
                        echo "<td>".$user_data['alamat']."</td>";
                        echo "<td>".$user_data['kelamin']."</td>";
                        echo "<td><a href='edit_emp.php?id=$user_data[id]'>Edit</a> | <a href='delete_emp.php?id=$user_data[id]'>Delete</a></td></tr>";
                    }
                ?>
            </table>
        <?php else: ?>
            <p>Belum ada karyawan.</p>
            <div style="width: 80%; display: flex; justify-content: end; margin-bottom: 10px;">
                <button type="button"><a href="add_emp.php" style="text-decoration: none; color: black;">Tambah Karyawan</a></button>
            <div>
        <?php endif; ?>
    </body>
</html>
