<?php
    include_once("config.php");

    session_start();

    if (!isset($_SESSION['session_username']) || $_SESSION['session_tipe'] != 'employee') {
        header("Location: login.php");
        exit();
    }

    $result = mysqli_query($mysqli, "SELECT * FROM customers ORDER BY id DESC");
?>

<html>
    <head>
        <title>Data Pelanggan</title>
    </head>

    <body style="display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 100vh;">
        <h1 style="text-decoration: underline;">Data Pelanggan</h1>
        <?php if(mysqli_num_rows($result) > 0): ?>
            <table width="80%" border=1>
                <div style="width: 80%; display: flex; margin-bottom: 10px;">
                    <button type="button"><a href="logout.php" style="text-decoration: none; color: black;">Logout</a></button>
                    <div style="flex-grow: 1;"></div>
                    <button type="button"><a href="add_cus.php" style="text-decoration: none; color: black;">Tambah Customer</a></button>
                <div>
                <tr>
                    <th>Nama</th> <th>Telepon</th> <th>Berat (Kg)</th> <th>Tipe</th> <th></th>
                </tr>
                <?php
                    while($customer_data = mysqli_fetch_array($result)) {         
                        echo "<tr>";
                        echo "<td>".$customer_data['nama']."</td>";
                        echo "<td>".$customer_data['telepon']."</td>";
                        echo "<td>".$customer_data['berat']."</td>";
                        echo "<td>".$customer_data['tipe']."</td>";
                        echo "<td><a href='delete_cus.php?id=$customer_data[id]'>Selesai</a></td></tr>";        
                    }
                ?>
            </table>
        <?php else: ?>
            <p>Belum ada customer.</p>
            <div style="width: 80%; display: flex; justify-content: end; margin-bottom: 10px;">
                <button type="button"><a href="add_cus.php" style="text-decoration: none; color: black;">Tambah Customer</a></button>
            <div>
        <?php endif; ?>
    </body>
</html>
