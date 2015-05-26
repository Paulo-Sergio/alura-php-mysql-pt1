<?php

function listaProdutos($conexao) {
    $produtos = array();
    //$query = "SELECT * FROM produtos";
    $query = "SELECT p.*,c.nome as categoria_nome FROM produtos as p JOIN categorias as c ON c.id=p.categoria_id";
    $resultado = mysqli_query($conexao, $query);
    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }
    return $produtos;
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {
    //criando a query para colocar os valores dentro de nome e preco
    $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}',{$preco}, '{$descricao}', {$categoria_id}, {$usado})";
    //vai executar a query
    return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado){
    $query = "UPDATE produtos SET nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id}, usado = {$usado} WHERE id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id){
    $query = "SELECT * FROM produtos WHERE id = {$id}";
    $resultado =  mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function removeProduto($conexao, $id){
    $query = "DELETE FROM produtos WHERE id = {$id}";
    return mysqli_query($conexao, $query);
}