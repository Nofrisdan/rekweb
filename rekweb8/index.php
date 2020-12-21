<?php
require 'function.php';
$database = query("SELECT * FROM parkir");

//controls
if(isset($_POST['input'])){
    $input = true;
}elseif(isset($_POST['view'])){
    $view = true;
}

//logic
if(isset($_POST["save"])){
    if(input($_POST) >0){
        echo "<script>alert('Data Anda Berhasil Ditambahkan');</script>";
    }else{
        echo "<script>alert('Data anda tidak berhasil di tambahkan')</script>";
    }
}


//waktu
$time = date('H:i');




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="img/parkir.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas REKAYASA WEB</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="cover">

    <div class="judul">
            <h1>Aplikasi Parkir online</h1>
    </div>

    <div class="logo">
        <img src="img/parkir.png">
    </div>
    <div class="time">
        <h1><?= $time; ?></h1>
    </div>

    <div class="conten">
        <form method="post">
            <button type="submit" name="input" class="btn btn-success">Input data</button>
        </form>
        <form method="post">
            <button type="submit" name="view" class="btn btn-primary">Lihat data</button>
        </form>
    </div>
</div>

    <?php if(isset($input)) : ?>
    <div class="input">
        <form method="post">
            <input type="hidden" value="<?= $time; ?>" name="waktu">
            <ul>
                <li>
                    <label for="id">Id Kendaraan</label>
                    <input type="text" value="PO-" name="id" id="id" required autofocus>
                </li>
                <li>
                    <label for="merek">Merk Kendaraan</label>
                    <input type="text" name="merek" id="merek" placeholder="Masukkan merk kendaraan" required>
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
                    <input type="text" name="flat" id="flat" placeholder="Masukkan No flat kendaraan" required>
                </li>
                <li>
                     <button type="submit" name="save" class="btn btn-success">Save</button>
                </li>
            </ul>
        </form>
    </div>
    <?php endif; ?>


    
    <?php if(isset($view)) : ?>
    <div class="view">
        <table border="1" cellspacing="0" cellspacing="10">
            <tr>
                <th>No</th>
                <th>Id Kendaraan</th>
                <th>Merek Kendaraan</th>
                <th>Jenis Kendaraan</th>
                <th>Flat Kendaraan</th>
                <th>Jam Masuk</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($database as $data) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data['id_kendaraan']; ?></td>
                    <td><?= $data['merek']; ?></td>
                    <td><?= $data['jenis_kendaraan']; ?></td>
                    <td><?= $data['flat_kendaraan']; ?></td>
                    <td><?= $data['waktu']; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $data['id'];?>" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" >
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a> |
                        <a href="delete.php?id=<?= $data['id']; ?>" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16" >
                            <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php $i++; ?>
            <?php endforeach;?>

        </table>
    </div>
    <?php endif;?>
        
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
</body>
</html>