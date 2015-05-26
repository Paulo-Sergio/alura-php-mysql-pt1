<?php include './cabecalho.php'; ?>
<?php include './conecta.php'; ?>
<?php include './banco-produto.php'; ?>

<?php
$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
if (array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}

if (alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) {
    ?>
    <p class="text-success">Produto <?= $nome; ?>, R$ <?= $preco; ?> alterado com sucesso!</p>
    <?php
} else {
    $msg = mysqli_error($conexao);
    ?>
    <p class="text-danger">Produto <?= $nome; ?> não alterado: <?= $msg ?></p>
    <?php
}
?>

<?php include './rodape.php'; ?>