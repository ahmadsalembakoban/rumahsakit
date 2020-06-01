
<?php

    // setting default time zone dan session start
    date_default_timezone_set('Asia/Jakarta');
    session_start();

    

    
    // koneksi
    // $conn = mysqli_connect('localhost', 'root', '', 'rumahsakit');
    
    include_once "connection.php";
    $conn = mysqli_connect($conn['host'], $conn['user'], $conn['pass'], $conn['db'] );
    if(mysqli_connect_error()){
        echo mysqli_connect_error();
    }


    // fungsi base_url
    function base_url($url = null){
        $base_url = "http://localhost/rumahsakit";
            if($url != null){
                return $base_url."/".$url;
            }else{
                return $base_url;
            }
    }


    
?>

