<?php
function listaCategorias($conexao){
    $categorias = array();
    $query = "SELECT * FROM categorias";
    $resultado = mysqli_query($conexao, $query);
    while($categoria = mysqli_fetch_array($resultado)){
        array_push($categorias, $categoria);
    }
    return $categorias;
}