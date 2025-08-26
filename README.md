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

- [Página inicial](index.php)
- [Variáveis e Constantes](./estudos/index.php)
    - Tipos de dados: string, int, float, boolean, array.
    - Definição de variáveis e constantes.
    - Escopo de variáveis (local, global, superglobais).
    - Exercício: Criar variáveis para nome, idade e uma constante para país, e exibir tudo.
- [Operadores](./estudos/operadores.php)
    - Aritméticos, comparação, lógicos e concatenadores.
    - Operadores de atribuição.
    - Exercício: Criar uma calculadora simples usando variáveis.
- [Estruturas de Controle](./estudos/estrutura-controle.php)
    - if, else, elseif.
    - switch e operadores ternários.
    - Exercício: Criar um script que imprime se o número é positivo, negativo ou zero.
- [Estruturas de Repetição](./estudos/estrutura-repeticao.php)
    - for, foreach, while, do while.
    - Controle de loop: break e continue.
    - Exercício: Criar um script que soma os números de 1 a 100.
- [Funções](./estudos/funcoes.php)
    - Criação de funções (function).
    - Parâmetros, valores de retorno.
    - Escopo dentro de funções.
    - Exercício: Criar uma função que recebe um número e retorna se é par ou ímpar.
- [Arrays](./estudos/arrays.php)
    - Arrays indexados e associativos.
    - Funções básicas: count, array_push, array_pop, in_array.
    - Arrays multidimensionais.
    - Exercício: Criar um array de frutas e imprimir cada fruta com foreach.
- [Manipulação de Strings](./estudos/funcoes.php)
    - Concatenar, cortar, substituir, buscar.
    - Funções importantes: strlen, strpos, substr, str_replace.
    - Exercício: Criar um script que substitui uma palavra em uma frase.
- [Entrada e Saída de Dados](./estudos/funcoes.php)
    - $_GET e $_POST.
    - Formulários HTML e PHP.
    - Segurança básica: htmlspecialchars e filter_input.
    - Exercício: Criar um formulário que recebe nome e idade e exibe uma saudação.
- [Sessões e Cookies]()
    - Iniciar sessão: session_start().
    - Criar e ler cookies.
    - Exercício: Criar um contador de visitas usando sessão.
- [Manipulação de Arquivos]()
    - Ler, escrever e atualizar arquivos.
    - Funções: fopen, fwrite, fread, file_get_contents, file_put_contents.
    - Exercício: Criar um script que salva comentários em um arquivo comentarios.txt.
- [Introdução a Banco de Dados]()
    - MySQL e PDO.
    - Conectar, consultar e inserir dados.
    - Exercício: Criar tabela usuarios e inserir alguns registros via PHP.
- [Segurança Básica]()
    - SQL Injection e XSS.
    - Preparar queries com PDO.
    - Filtragem de entradas.
    - Exercício: Modificar o formulário do módulo 10 para salvar dados no banco usando PDO.
- [Projetos Práticos]()
    - Mini sistema de cadastro e login.
    - CRUD de tarefas ou produtos.
    - Uso de templates simples (include e require).

<!-- pasta estudos/ e projetos/ -->