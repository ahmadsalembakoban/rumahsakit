<?php 
    require_once "../_config/config.php";
    require_once "../_assets/libs/vendor/autoload.php";


    use Ramsey\Uuid\Uuid;


    if(isset($_POST['add'])) {
        $uuid = Uuid::uuid4()->toString();
        $identitas = trim(mysqli_real_escape_string($conn, $_POST['identitas']));
        $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));
        $jk = trim(mysqli_real_escape_string($conn, $_POST['jk']));
        $alamat = trim(mysqli_real_escape_String($conn, $_POST['alamat']));
        $telp = trim(mysqli_real_escape_string($conn, $_POST['telp']));

        $sql_cek_identitas = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE nomor_identitas = '$identitas'") or die (mysqli_error($conn));
            if(mysqli_num_rows($sql_cek_identitas) > 0) {
                echo "<script>alert('Nomor identitas sudah pernah di input!'); window.location='add.php';</script>";
            } else {
                mysqli_query($conn, "INSERT INTO tb_pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES ('$uuid', '$identitas', '$nama', '$jk', '$alamat', '$telp')") or die(mysqli_error($conn));
                echo "<script>window.location='data.php';</script>";
            }
    } else if (isset($_POST['edit'])) {

    } 
    
?>