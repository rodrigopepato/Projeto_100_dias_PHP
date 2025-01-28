# Composer: Um Gerenciador de Dependências para PHP

O **Composer** é uma ferramenta essencial para desenvolvedores PHP que facilita a gestão de dependências e bibliotecas em projetos. Ele permite declarar as bibliotecas necessárias para um projeto e as instala automaticamente.

## Principais Recursos
- **Gerenciamento de Dependências:** Define e resolve automaticamente as dependências do projeto.
- **Autoloading:** Configura automaticamente o carregamento de classes no projeto.
- **Controle de Versões:** Permite especificar versões específicas ou intervalos de versões das bibliotecas.
- **Repositório Packagist:** Repositório padrão do Composer com milhares de pacotes disponíveis.

## Arquivo `composer.json`
O Composer utiliza o arquivo `composer.json` para armazenar as dependências e configurações do projeto. Exemplos de campos:
- `"require"`: Lista de pacotes necessários.
- `"autoload"`: Configuração do autoloading.
- `"scripts"`: Comandos customizados para o projeto.

### Exemplo
```json
{
  "require": {
    "monolog/monolog": "^2.0"
  },
  "autoload": {
    "psr-4": {
      "App\\": "src/"
    }
  }
}
```

## Comandos Mais Usados
- `composer install`: Instala as dependências listadas no `composer.json`.
- `composer update`: Atualiza as dependências para as versões mais recentes compatíveis.
- `composer require <pacote>`: Adiciona um novo pacote ao projeto.
- `composer dump-autoload`: Recria o autoloader do Composer.

## Benefícios do Composer
- **Facilidade de uso:** Automação na instalação e atualização de pacotes.
- **Organização:** Centraliza as dependências no `composer.json`.
- **Comunidade:** Grande suporte da comunidade e biblioteca extensa no Packagist.
