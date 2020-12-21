<?php
$localhost = "localhost";
$user = "nofrisdan";
$pass = "N03D0600";
$db = "18030046";

$connect = mysqli_connect($localhost,$user,$pass,$db);

if(mysqli_error($connect)){
    echo "Database tidak tersambung";
}

function query($data){
    global $connect;
    $query = mysqli_query($connect,$data);
    $rows = [];
    while($row = mysqli_fetch_assoc($query)){  //mengambil data jenis string
        $rows[] = $row; //menambahkan elemen baru dari $rows ke $row (sama seperti materi array FOREACH())

    }
    return $rows;
}

function input($data){
    global $connect;
    $id = htmlspecialchars($data["id"]);
    $merek = htmlspecialchars($data["merek"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $flat = htmlspecialchars($data["flat"]);
    $waktu = htmlspecialchars($data['waktu']);
    $query = "INSERT INTO parkir VALUES(null,'$id','$merek','$jenis','$flat','$waktu')";

    mysqli_query($connect,$query);

    return mysqli_affected_rows($connect);
}

//function ubah
function ubah($data){
    global $connect;
    $id = $data["id"];
    $id_kendaraan = htmlspecialchars($data["id_kendaraan"]);
    $merek = htmlspecialchars($data["merek"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $flat = htmlspecialchars($data["flat"]);

    $query = "UPDATE parkir SET  
                id_kendaraan ='$id_kendaraan',
                merek = '$merek',
                jenis_kendaraan = '$jenis',
                flat_kendaraan = '$flat'
                WHERE id = $id
                ";

    mysqli_query($connect,$query);

    return mysqli_affected_rows($connect);
}
//function delete
function delete($id){
    global $connect;
    mysqli_query($connect,"DELETE FROM parkir WHERE id=$id");

    return mysqli_affected_rows($connect);
}



?>