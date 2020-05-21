<?php 
    require_once "../_config/config.php";
    require_once "../_assets/libs/vendor/autoload.php";


    use Ramsey\Uuid\Uuid;


    if(isset($_POST['add'])) {
        $uuid = Uuid::uuid4()->toString();
        $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));
        $ket = trim(mysqli_real_escape_String($conn, $_POST['ket']));
        mysqli_query($conn, "INSERT INTO tb_obat (id_obat, nama_obat, ket_obat) VALUES ('$uuid', '$nama', '$ket')") or die(mysqli_error($conn));
        echo "<script>window.location='data.php';</script>";
    } else if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));
        $ket = trim(mysqli_real_escape_string($conn, $_POST['ket']));
        mysqli_query($conn, "UPDATE tb_obat SET nama_obat = '$nama', ket_obat = '$ket' WHERE id_obat = '$id' ") or die (mysqli_error($conn));
        echo "<script>window.location='data.php';</script>";
    } 
    
?>