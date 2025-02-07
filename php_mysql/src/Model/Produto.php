<?php

class Produto {

    public function __construct(
        private ?int $id,
        private string $tipo,
        private string $nome,
        private string $descricao,
        private float $preco,
        private string $imagem = 'logo-serenatto.png'
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function tipo(): string
    {
        return $this->tipo;
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function descricao(): string
    {
        return $this->descricao;
    }

    public function imagem(): string
    {
        return $this->imagem;
    }

    public function preco(): float
    {
        return $this->preco;
    }

    public function precoFormatado(): string
    {
        return 'R$ ' . number_format($this->preco(), 2);
    }

    public function caminhoImagem(): string
    {
        return 'img/' . $this->imagem();
    }

}
