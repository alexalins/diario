<?php
    error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    // obtém a conexão com o banco MySQL
    
    $conexao = mysqli_connect("localhost", "root", "") or print (mysql_error());  
  
      $sql = "CREATE DATABASE if not exists diario";
   
        // Executa o comando SQL
        $result = mysqli_query($conexao, $sql);
  
        // Verifica se o comando foi executado com sucesso
        if(!$result)
            die("Falha na criacao do banco: " . mysqli_error());
        else{
                mysqli_select_db($conexao, "diario") or print(mysqli_error()); 
                
                $sql = "CREATE TABLE if not exists texto(
                    id int primary key auto_increment,
                    titulo varchar(50) not null,
                    txt text not null
                )";
      
                // Executa o comando SQL
                $result = mysqli_query( $conexao,$sql);
      
                // Verifica se o comando foi executado com sucesso
                if(!$result)
                    die("Falha na tabela texto: " . mysqli_error());

                //==================================================================

                $sql = "CREATE TABLE if not exists usuario(
                    id int primary key auto_increment,
                    login varchar(50) not null,
                    senha varchar(50) not null
                )";
      
                // Executa o comando SQL
                $result = mysqli_query( $conexao,$sql);
      
                // Verifica se o comando foi executado com sucesso
                if(!$result)
                    die("Falha na tabela usuario: " . mysqli_error());
  
    }
  // fecha a conexão
  mysqli_close($conexao); 
?>
