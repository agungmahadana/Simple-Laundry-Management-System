<html>
    <head>
        <title>Tambah Pelanggan</title>
    </head>

    <body style="display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 100vh;">
        <h1 style="text-decoration: underline;">Tambah Pelanggan</h1>
        <form action="add_cus.php" method="post" name="submit_cus">
            <table>
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
                    <td>Berat (Kg)</td>
                    <td>:</td>
                    <td><input type="number" name="berat"></td>
                </tr>
                <tr> 
                    <td>Tipe</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="tipe" value="Cuci">Cuci
                        <input type="radio" name="tipe" value="Cuci + Setrika">Cuci + Setrika
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" name="Submit" value="Tambah"></td>
            <button type="button"><a href="employee.php" style="text-decoration: none; color: black;">Cancel</a></button>
        </form>
        
        <?php
            if(isset($_POST['Submit'])) {
                $nama = $_POST['nama'];
                $telepon = $_POST['telepon'];
                $berat = $_POST['berat'];
                $tipe = $_POST['tipe'];
                include_once("config.php");
                $result = mysqli_query($mysqli, "INSERT INTO customers(nama,telepon,berat,tipe) VALUES('$nama','$telepon','$berat','$tipe')");
                header("Location: employee.php");
            }
        ?>
    </body>
</html>