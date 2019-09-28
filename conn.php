<?php

    

    // echo $_SERVER['HTTP_HOST'];
       $servername= "";
        $username= "";
        $password= "";
        $DatabaseName  = "";

    if($_SERVER['HTTP_HOST'] == "localhost"){
        $servername= "localhost";
        $username= "root";
        $password= "123123";
        $DatabaseName  = "petscience_db";
    }else{
        
        $servername= "localhost";
        $username= "u194745461_root";
        $password= "8462017935";
        $DatabaseName  = "u194745461_petscience_db";
        
    }
    

    $conn = mysqli_connect($servername,$username,$password,$DatabaseName);
    $Conn_MYSQLI = new mysqli($servername, $username, $password,$DatabaseName);

    

?>
   