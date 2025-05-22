# 🎮 Game API

Uma API RESTful construída com **Laravel 12.x** e **MySQL** para gerenciamento de jogos, permitindo criar, listar, buscar, atualizar e excluir registros.

## ⚙️ Tecnologias Utilizadas

- ✅ Laravel 12.x (Framework PHP)
- ✅ MySQL (Banco de dados relacional)
- ✅ Eloquent ORM (Mapeamento objeto-relacional)
- ✅ Postman (Testes de requisições HTTP)

## 📌 Funcionalidades

- Criar novos jogos
- Listar todos os jogos
- Buscar jogo por nome
- Atualizar informações de um jogo existente
- Remover um jogo

## 📁 Estrutura das Rotas

| Método | Rota                    | Descrição                      |
|--------|-------------------------|--------------------------------|
| POST   | `/api/create`           | Cria um novo jogo              |
| GET    | `/api/listall`          | Lista todos os jogos           |
| GET    | `/api/getByName/{name}` | Busca um jogo pelo nome        |
| PUT    | `/api/update/{name}`    | Atualiza os dados de um jogo   |
| DELETE | `/api/delete/{name}`    | Remove um jogo pelo nome       |

## 📤 Exemplo de JSON (para criação/atualização)

```json
{
  "name": "God of War",
  "category": "Action",
  "year": 2018
}
