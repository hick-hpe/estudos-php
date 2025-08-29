# 📝 Todo List

Um projeto de _TodoList_ para gerenciar tarefas, com autenticação de usuários e conexão com banco de dados MySQL.

## 📚 Conceitos abordados:
- Entrada e Saída de Dados
- Estrutura de controle
- Estrutura de repetição
- Manipulação de Strings
- Arrays
- Sessões
- Conexão com banco de dados

## 📁 Estrutura do projeto:

```
todolist/
├── assets/
│   ├── script.js
│   └── style.css
├── auth/
│   ├── excluir-conta.php
│   ├── login.php
│   ├── logout.php
│   ├── register.php
├── tasks/
│   ├── atualizar-tarefa.php
│   ├── criar-tarefa.php
│   ├── excluir-tarefa.php
│   ├── tarefas.php
├── db/
│   ├── init.sql
│   ├── conn.php
├── docker-compose.yml
├── Dockerfile
├── index.php
├── register-form.php
├── README.md
```

- `assets/style.css`: Estilos personalizados do projeto.
- `assets/script.js`: Scripts personalizados do projeto.
- `auth/excluir-conta.php`: Remove os dados do usuário da sessão e encerra o login.
- `auth/login.php`: Verifica se o usuário existe, valida a senha e inicia a sessão do usuário.
- `auth/logout.php`: Encerra a sessão do usuário logado
- `auth/register.php`: Gerencia o registro de novos usuários.
- `task/criar-tarefa.php`: Script para adicionar novas tarefas.
- `task/excluir-tarefa.php`: Script para excluir tarefas.
- `task/atualizar-tarefa.php`: Script para atualizar tarefas.
- `task/tarefas.php`: Script para listar tarefas.
- `db/conn.php`: Script para conexão com o banco de dados.
- `db/init.sql`: Script criar as tabelas do banco de dados.
- `index.php`: Página principal (login).
- `docker-compose.yml`: Orquestração dos containers (PHP + MySQL + PHPMyAdmin).
- `Dockerfile`: Define a imagem Docker da aplicação PHP e instala o conector `mysqli`.
- `README.md`: Documentação do projeto.

## 📝 Funcionalidades
- Adicionar novas tarefas
- Atualizar tarefas existentes
- Excluir tarefas
- Login
- Registro
- Excluir contas
- Filtrar tarefas por nome
- Persistência via banco (MySQL)

## 🚀 Como rodar o projeto

Para subir o servidor:
- Acesse o diretório onde está o arquivo `docker-compose.yml`: 
    ```bash
    cd projetos/todolist_v3/
    ```
- Execute:
    ```bash
    docker compose up -d
    ```

Links para acessar:
- `projeto`: http://localhost:8000/
- `phpmyadmin` : http://localhost:8080/

