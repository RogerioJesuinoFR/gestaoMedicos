<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $bd_name = 'web-servidor';

    $connx = mysqli_connect($host, $user, $password, $bd_name);

    /*para testar a conexão

    if($connx){
        echo 'Conexão estabelecida!';
    } else {
        echo 'Erro ao conectar';
    }
    
    http://localhost/code/web-servidor/trabalho-web_servidor/config.php
    */

?>