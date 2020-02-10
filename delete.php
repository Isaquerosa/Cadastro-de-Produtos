<?php 

require "conexao.php";

$connection = conexao();

$id = $_GET["id"];

$sql = "DELETE FROM produto WHERE id=:id";

$stmt = $connection->prepare($sql);

if ($stmt->execute([":id" => $id])){

    header ("Location: read.php");
}