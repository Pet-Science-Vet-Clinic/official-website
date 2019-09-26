<?php

    // $servername= "localhost";
    // $username= "id7668311_localhost";
    // $password= "1234";
    // $DatabaseName  = "id7668311_webprog";

    // $conn = mysqli_connect($servername,$username,$password);
    // $Conn_MYSQLI = new mysqli($servername, $username, $password,$DatabaseName);

    // if(!$conn)
    // {
    //   echo 'Not Connected To Server';
    // }

    // if(!mysqli_select_db($conn, 'id7668311_webprog'))
    // {
    //     echo 'Database Not Selected';
    // }


    $servername= "localhost";
    $username= "root";
    $password= "123123";
    $DatabaseName  = "petscience_db";

    $conn = mysqli_connect($servername,$username,$password,$DatabaseName);
    $Conn_MYSQLI = new mysqli($servername, $username, $password,$DatabaseName);

    // if(!$conn)
    // {
    //   echo 'Not Connected To Server';
    // }else{
    //   echo 'Connected To Server';
    // }

    // if(!mysqli_select_db($conn, 'petscience_db'))
    // {
    //     echo 'Database Not Selected';
    // }


   