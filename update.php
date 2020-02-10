<?php 

require "conexao.php";

$connection = conexao();

$id = $_GET["id"];

$sql = "SELECT * FROM produto WHERE id=:id";

$stmt = $connection -> prepare($sql);

$stmt->execute([ ":id" => $id ]);

$item = $stmt->fetch(PDO::FETCH_OBJ);

if (isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["amount"])){

    $name = $_POST["name"];
    $price = $_POST["price"];
    $amount = $_POST["amount"];

    $sql = "UPDATE produto SET  name=:name, price=:price, amount=:amount WHERE id=:id ";

    $stmt = $connection -> prepare($sql);

    if ($stmt -> execute([":name" => $name, ":price" => $price, ":amount" => $amount, ":id" => $id])){

       header("Location: read.php");
    }
}
?>

<?php require "index.php";?>

<div class="container">
    <div class="card mt-5" >
        <div class="card-header">
            <h2>Editar Produto</h2>
        </div>

        <div class="card-body">
            <form method="post">
            <div class="form-group">
                <label for="name">Nome</label>
                <input value="<?= $item->name; ?>" type="text" name="name" id="name" id="form-control">
            </div>   
            <div class="form-group">
                <label for="price">Preço</label>
                <input value="<?= $item->price;?>"  type="text" name="price" id="price" id="form-control">
            </div>  
            <div class="form-group">
                <label for="amount">Quantidade</label>
                <input value="<?= $item->amount; ?>" type="number" name="amount" id="amount" id="form-control">
            </div>  
            <div class="form-group">
                <button type="submit" class="btn btn-info">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>    

