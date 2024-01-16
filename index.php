<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "bad_habitscreate";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak bisa terkoneksi");
}
$Nama_artikel = "";
$ukuran = "";
$harga = "";
$sukes = "";
$error = "";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = ""; 
}
if($op == 'delete'){
    $id = $_GET['id'];
    $sql1 = "delete from bad_habits where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if($q1){
        $sukses = "berhasil hapus data";
    }else{
        $error = "gagal melakukan delete";
    }
}
if($op == 'edit'){
    $id  = $_GET['id'];
    $sql1 = "select * from bad_habits where id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);
    $r1 = mysqli_fetch_array($q1);
    $Nama_artikel = $r1["Nama_artikel"];
    $ukuran = $r1["ukuran_kaos"];
    $harga = $r1["harga"];

    if($Nama_artikel == ''){
        $error = "data tidak ditemukan";
    }

}

if(isset($_POST['simpan'])){
    $Nama_artikel = $_POST['Nama_artikel'];
    $ukuran = $_POST['ukuran'];
    $harga = $_POST['harga'];

    if($Nama_artikel && $ukuran && $harga){
        if($op == 'edit'){ //untuk update
            $sql1 = "update bad_habits set Nama_artikel = '$Nama_artikel',ukuran_kaos='$ukuran',harga='$harga' where id ='$id'";
            $q1 = mysqli_query($koneksi,$sql1);
            if($q1){
                $sukes = "berhasil diupdate";
            }else{
                $error = "gagal update";
            }
        }else{ //untuk insert
            $sql1 = "insert into bad_habits(Nama_artikel,ukuran_kaos,harga) values ('$Nama_artikel','$ukuran','$harga')";
        $q1 = mysqli_query($koneksi,$sql1);
        if($q1){
            $sukes = "berhasil masukkan data";
        }else{
            $error = "gagal masukkan data";
        } 
        }
       
    }else{
        $error = "masukkan semua data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- masukkan data -->
        <div class="card">
            <div class="card-header">
                bad habits
            </div>
            <div class="card-body">
                <?php
                if($error){
                    ?>
                    <div class="alert alert-primary" role="alert">
                        <?php echo $error; ?>
                    <?php
                }
                ?>
                <?php
                if($sukes){
                    ?>
                    <div class="alert alert-succes" role="alert">
                        <?php echo $sukes; ?>
                    <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama artikel" class="form-label">Nama artikel</label>
                        <input type="text" class="form-control" id="Nama_artikel" name="Nama_artikel" value="<?php echo $Nama_artikel ?>"
                            placeholder="masukkan nama artikel T-shirt">
                    </div>
                    <div class="mb-3">
                        <label for="ukuran kaos" class="form-label">ukuran kaos</label>
                        <input type="text" class="form-control" id="ukuran" name="ukuran" value="<?php echo $ukuran ?>"
                            placeholder="ukuran">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga ?>"
                            placeholder="harga T-shirt">
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="simpan data" class="btn btn-primary"/>
                        <a href="<?= base_url()?>"><span class="badge bg-secondary">Home</span></a>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Item
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nama artikel</th>
                            <th scope="col">ukuran</th>
                            <th scope="col">harga</th>
                        </tr>
                        <tbody>
                            <?php
                            $sql2 = "select * from bad_habits order by id ";
                            $q2 = mysqli_query($koneksi,$sql2);
                            $urut = 1;
                            while($r2 = mysqli_fetch_array($q2)){
                                $id = $r2['id'];
                                $Nama_artikel = $r2['Nama_artikel'];
                                $ukuran_kaos = $r2['ukuran_kaos'];
                                $harga = $r2['harga'];
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $urut++ ?></th>
                                    <td scope="row"><?php echo $Nama_artikel ?></td>
                                    <td scope="row"><?php echo $ukuran_kaos ?></td>
                                    <td scope="row"><?php echo $harga ?></td>
                                    <td scope="row">
                                        <a href="badhabits.php?op=edit&id=<?php echo $id?>"><button type="button" class="btn btn-warning">edit</button></a>
                                        <a href="badhabits.php?op=delete&id=<?php echo $id?>" onclick="return confirm('yakin mau delete?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                    
                                    

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                </table>

            </div>
        </div>
</body>

</html>