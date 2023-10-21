# API de Job App

Bem-vindo à API Job App, desenvolvida em CakePHP.

## Descrição

A API Job App é uma aplicação para gerenciar usuários, cargos e vagas de emprego. Ela fornece endpoints para realizar operações CRUD em cada uma dessas entidades.

## Tecnologias Utilizadas

- **CakePHP**: Um framework PHP elegante e cheio de recursos para desenvolvimento rápido e limpo.
- **MySQL**: Banco de dados relacional utilizado para armazenar dados da aplicação.
- **Composer**: Gerenciador de dependências para PHP, utilizado para instalar e autoloading de bibliotecas e componentes.

## Configuração do Ambiente

Certifique-se de ter o ambiente configurado corretamente antes de iniciar a API. Você pode seguir as instruções abaixo:

1. **Requisitos:**
   - PHP 7.2 ou superior
   - Composer (para gerenciamento de dependências)
   - MySQL ou outro banco de dados suportado pelo CakePHP

2. **Instalação:**
   ```bash
   composer install

## Endpoints Disponíveis
## Usuários
## GET /usuario: Obter lista de usuários.
## GET /usuario/{id}: Obter detalhes de um usuário específico.
## POST /usuario: Adicionar um novo usuário.
## PUT /usuario/{id}: Atualizar informações de um usuário.
## DELETE /usuario/{id}: Remover um usuário.

## Cargos
## GET /cargo: Obter lista de cargos.
## GET /cargo/{id}: Obter detalhes de um cargo específico.
## POST /cargo: Adicionar um novo cargo.
## PUT /cargo/{id}: Atualizar informações de um cargo.
## DELETE /cargo/{id}: Remover um cargo.

## Vagas
## GET /vaga: Obter lista de vagas.
## GET /vaga/{id}: Obter detalhes de uma vaga específica.
## POST /vaga: Adicionar uma nova vaga.
## PUT /vaga/{id}: Atualizar informações de uma vaga.
## DELETE /vaga/{id}: Remover uma vaga.