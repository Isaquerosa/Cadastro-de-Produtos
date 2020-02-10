<?php
 /**
 * 
 * @return \PDO  
*/

function conexao(){
  try {
       $conexao = new PDO("mysql:host=localhost:3306; charset=utf8; dbname=restaurante", "root", "");
        return $conexao;
    }catch (PDOException $erro) {
    echo "Erro na conexão". $erro -> getMessage();
    }
}
