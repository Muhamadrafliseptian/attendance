<?php



// membuat koneksi ke database 

    $localhost ="localhost";
    $user      = "root";
    $pass      = "";
    $dbname    = "attendance";

    $conn = mysqli_connect($localhost ,$user, $pass, $dbname);

    if(!$conn){
        echo "koneksi berhasil";
        
    }



    
?>