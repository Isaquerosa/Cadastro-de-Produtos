<?php

require "conexao.php";

$connection = conexao();

$sql = "SELECT * FROM produto";

$stmt = $connection->prepare($sql);

$stmt->execute();

$produto = $stmt->fetchAll(PDO::FETCH_OBJ);

?>

<?php require "./index.php";?>

<div class="conatiner">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Produtos</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                </tr>
                <?php foreach($produto as $item):?>
                <tr>
                    <td><?= $item->id; ?></td>
                    <td><?= $item->name; ?></td>
                    <td><?= $item->price;?></td>
                    <td><?= $item->amount;?></td>
                    <td>
                        <a href="update.php?id=<?= $item->id ?>" class="btn btn-info">Editar</a>
                        <a onclick="return confirm('Tem certeza que quer excluir?')" href="delete.php?id=<?= $item->id ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>    
    </div>
</div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
