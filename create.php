<?php 

require "conexao.php";

$connection = conexao();

$message = "";

if (isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["amount"])){

    $name = $_POST["name"];
    $price = $_POST["price"];
    $amount = $_POST["amount"];

    $sql = "INSERT INTO produto(name, price, amount) VALUES(:name, :price, :amount) ";

    $stmt = $connection -> prepare($sql);

    if ($stmt -> execute([":name" => $name, ":price" => $price, ":amount" => $amount])){

        $message = "Produto cadastrado com sucesso!";
    }
}
?>

<?php require "index.php";?>
<div class="container">
    <div class="card mt-5" >
        <div class="card-header">
            <h2>Cadastrar Produtos</h2>
        </div>

        <div class="card-body">
         <?php if(!empty($message)): ?>
            <div class="alert alert-success">
                <?= $message; ?>
         </div>
         <?php endif; ?>
            <form method="post">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" id="form-control">
            </div>   
            <div class="form-group">
                <label for="price">Preço</label>
                <input type="text" name="price" id="price" id="form-control">
            </div>  
            <div class="form-group">
                <label for="amount">Quantidade</label>
                <input type="number" name="amount" id="amount" id="form-control">
            </div>  
            <div class="form-group">
                <button type="submit" class="btn btn-info">Cadastrar Produto</button>
            </div>
            </form>
        </div>
    </div>
</div>    
