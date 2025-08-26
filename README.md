# PHP + Docker 🐳🐘

Este repositório contém meus estudos da linguagem de programação PHP, rodando dentro de um contêiner Docker (não é necessário instalar PHP localmente). <br>

PHP é uma linguagem de programação criada em 1995 por Rasmus Lerdorf, inicialmente como um conjunto de CGI para páginas pessoais.
Seu objetivo principal era criar páginas dinâmicas para a web. Hoje, o PHP é amplamente usado em sistemas web como WordPress, Laravel e MediaWiki.

## 🚀 Executando com Docker
Para subir o servidor PHP embutido, basta rodar no terminal dentro da pasta do projeto:

```bash
docker run -it --rm -v "$PWD":/var/www/html -p 8000:8000 php:8.2-cli php -S 0.0.0.0:8000 -t /var/www/html
```

O que esse comando faz: <br>
- `-it`: modo interativo com terminal.
- `--rm`: remove o contêiner ao parar.
- `-v "$PWD":/var/www/html`: monta a pasta atual no contêiner.
- `-p 8000:8000`: expõe o servidor na porta 8000.
- `php:8.2-cli`: imagem oficial do PHP 8.2.
- `php -S 0.0.0.0:8000 -t /var/www/html`: inicia o servidor embutido do PHP.

Agora, basta abrir http://localhost:8000 no navegador.

## 📚 Conteúdo dos estudos

- [index.php](./estudos/index.php)
- [variaveis-e-constantes.php](./estudos/index.php)


