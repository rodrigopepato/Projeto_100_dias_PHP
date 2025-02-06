<?php

    require __DIR__ . '/src/conexao-bd.php';
    require __DIR__ . '/src/Model/Produto.php';
    require __DIR__ . '/src/Repositorio/ProdutoRepositorio.php';

$produtosRepositorio = new ProdutoRepositorio($pdo);
$produtosRepositorio->deletar($_POST['id']);


header('Location: admin.php');
