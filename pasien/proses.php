
<?php 
    require_once "../_config/config.php";
    require_once "../_assets/libs/vendor/autoload.php";
    include ('../_assets/libs/vendor/phpoffice/phpexcel/');



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
    } else if (isset($_POST['import'])) {
            // $file = $_FILES['file']['name'];
            // $ekstensi = explode(".", $file);
            // $file_name = "file-".round(microtime(true)).".".end($ekstensi);
            // $sumber = $_FILES['file']['tmp_name'];
            // $target_dir = "../_file/";
            // $target_file = $target_dir.$target_file;
            // $upload = move_uploaded_file($sumber, $target_file);
            //     if($upload) {
            //         echo "upload suksess!";
            //     } else {
            //         echo "upload gagal";
            //     }
            // echo $file_name;
            if (isset($_POST['import'])) {
                $file = $_FILES['file'];
                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];
    
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'xlsx');

                // $obj = PHPExcel_IOFactory::load($fileExt);
                // $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

                // echo $all_data[3]['B'];

                // unlink($fileExt);

                // $sql = "INSERT INTO tb_pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES";
                //     for ($i=3; $i <= count($all_data); $i++) {
                //         $uuid = Uuid::uuid4()->toString();
                //         $no_id = $all_data[$i]['A'];
                //         $nama = $all_data[$i]['B'];
                //         $jk = $all_data[$i]['C'];
                //         $alamat = $all_data[$i]['D'];
                //         $no_telp = $all_data[$i]['E'];

                //         $sql .= "('$uuid', '$no_id', '$nama', '$jk', '$alamat', '$telp'), ";
                //     }
                //     $sql = substr($sql, 0, -1);
                //     echo $sql;
    
                if(in_array($fileActualExt, $allowed)){
                    if($fileError === 0) {
                        if($fileSize < 1000000) {
                            $fileNameNew = uniqid('', true).".".$fileActualExt;
                            $fileDestination = '../_file/sample/'.$fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);
                            echo '<script>alert("Your file is successfully uploaded!")</script>';
                            echo '<script>window.location="data.php";</script>';
                        } else { 
                            echo '<script>alert("Your file is too big!")</script>';
                            echo '<script>window.location="data.php";</script>';
                        }
                    } else {
                        echo '<script>alert("There was an error uploading your file!")</script>';
                        echo '<script>window.location="data.php";</script>';
                    }
                } else {
                    echo '<script>alert("You cannot upload files of this type!")</script>';
                    echo '<script>window.location="data.php";</script>';
                }     
            }
   } 

?>   
