<?php

class ProdutoRepositorio
{

    public function __construct(private PDO $pdo) {}

    private function formarObjeto($dados): Produto
    {
        return new Produto(
            $dados['id'],
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            $dados['preco'],
            $dados['imagem']
        );
    }
    public function opcoesCafe(): array
    {
        $sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
        $statement = $this->pdo->query($sql1);
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(function ($cafe){
            return $this->formarObjeto($cafe);
        },$produtosCafe);

        return $dadosCafe;
    }
    public function opcoesAlmoco(): array
    {
        $sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
        $statement = $this->pdo->query($sql2);
        $produtosAlmoco = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosAlmoco = array_map(function ($almoco){
            return $this->formarObjeto($almoco);
        },$produtosAlmoco);

        return  $dadosAlmoco;
    }

    public function buscarTodos(): array
    {
        $sql = "SELECT * FROM produtos ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($produto){
            return $this->formarObjeto($produto);
        },$dados);

        return $todosOsDados;
    }

    public function buscarProduto(int $id)
    {
        $sql = 'SELECT * FROM produtos where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->formarObjeto($dados);
    }

    public function deletar(int $id): bool
    {
        $sql = 'DELETE FROM produtos where id = :id';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function salvar(Produto $produto):bool
    {
        $sqlInsert = 'INSERT INTO produtos (tipo, nome, descricao, preco, imagem) VALUES (:tipo, :nome, :descricao, :preco, :imagem)';
        $statement = $this->pdo->prepare($sqlInsert);

        $statement->bindValue(':tipo', $produto->tipo());
        $statement->bindValue(':nome', $produto->nome());
        $statement->bindValue(':descricao', $produto->descricao());
        $statement->bindValue(':preco', $produto->preco());
        $statement->bindValue(':imagem', $produto->imagem());

        return $statement->execute();
    }

    public function atualizar(Produto $produto):bool
    {
        $sqlUpdate = 'UPDATE produtos
        SET tipo = :tipo, nome = :nome, descricao = :descricao, preco = :preco, imagem = :imagem
        WHERE id = :id';

        $statement = $this->pdo->prepare($sqlUpdate);

        $statement->bindValue(':tipo', $produto->tipo());
        $statement->bindValue(':nome', $produto->nome());
        $statement->bindValue(':descricao', $produto->descricao());
        $statement->bindValue(':preco', $produto->preco());
        $statement->bindValue(':imagem', $produto->imagem());
        $statement->bindValue(':id', $produto->id(), PDO::PARAM_INT);

        return $statement->execute();
    }

}
