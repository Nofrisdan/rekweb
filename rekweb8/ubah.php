<?php
require 'function.php';

$ubah = $_GET['id'];

$data = query("SELECT * FROM parkir WHERE id = $ubah") [0];

if(isset($_POST['ubah'])){
    if(ubah($_POST)>0){
        echo "<script>alert('Berhasil Dirubah'); document.location.href = 'index.php'; </script>";
    }else{
        echo "<script>alert('Tidak berhasil dirubah');</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="img/parkir.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="ubah">
        <form method="post">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <ul>
                <li>
                    <label for="id1">Id Kendaraan</label>
                    <input type="text"  name="id_kendaraan" id="id1" value="<?= $data['id_kendaraan'] ?>" required autofocus>
                </li>
                <li>
                    <label for="merk">Merk Kendaraan</label>
                    <input type="text" name="merek" id="merk" placeholder="Masukkan merk kendaraan" value="<?= $data['merek'] ?>" required>
                </li>
                <li>
                    <label for="jenis">Jenis Kendaraan</label>
                    <select name="jenis" id="jenis">
                        <option value="">--pilih--</option>
                        <option value="Mobil">Mobil</option>
                        <option value="Motor">Motor</option>
                    </select>
                </li>
                <li>
                    <label for="flat"> Flat Kendaraan</label>
                    <input type="text" name="flat" id="flat" placeholder="Masukkan No flat kendaraan" value="<?= $data['flat_kendaraan'] ?>" required>
                </li>
                <li>
                     <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
                </li>
            </ul>
        </form>
    </div>

    
</body>
</html>