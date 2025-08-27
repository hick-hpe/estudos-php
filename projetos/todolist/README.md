# 📝 Todo List

Um projeto básico de _TodoList_ para gerenciar tarefas.

## 📚 Conceitos abordados:
- Entrada e Saída de Dados
- Estrutura de controle
- Estrutura de repetição
- Manipulação de Strings
- Arrays
- Sessões

## 📁 Estrutura do projeto:

```
todolist/
├── assets/
│   ├── script.js
│   └── style.css
├── atualizar-tarefa.php
├── criar-tarefa.php
├── excluir-tarefa.php
├── index.php
├── README.md
```

- `index.php`: Página principal da lista de tarefas.
- `criar-tarefa.php`: Script para adicionar novas tarefas.
- `excluir-tarefa.php`: Script para excluir tarefas.
- `filtrar-tarefas.php`: Script para filtrar tarefas por nome.
- `assets/style.css`: Estilos personalizados do projeto.
- `assets/script.js`: Scripts personalizados do projeto.
- `README.md`: Documentação do projeto.

## 📝 Funcionalidades
- Adicionar novas tarefas
- Atualizar tarefas existentes
- Excluir tarefas
- Filtrar tarefas por nome
- Persistência via sessão ($_SESSION)

## 🚀 Como rodar o projeto
Para subir o servidor PHP embutido, basta rodar no terminal dentro da pasta do projeto:

```bash
docker run -it --rm -v "$PWD":/var/www/html -p 8000:8000 php:8.2-cli php -S 0.0.0.0:8000 -t /var/www/html
```

Agora, basta abrir http://localhost:8000/projetos/todolist/ no navegador.
