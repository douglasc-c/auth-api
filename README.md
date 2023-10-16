## Sobre Auth API
Esta API oferece funcionalidades para o cadastro, listagem, criação, atualização e exclusão de empresas e clientes.

## Principais recursos da Auth API:
Listagem de Empresas e Clientes

Cadastro de Empresas e Clientes

Atualização de Dados de Empresas e Clientes

Exclusão de Empresas e Clientes

## Bibliotecas
- [UUID Ramsey](https://github.com/ramsey/uuid).
- [Vue](https://vuejs.org).
- [Vue Route](https://router.vuejs.org).
- [TailwindCSS](https://tailwindcss.com).
- [Postcss](https://postcss.org).
- [Vue The Mask](https://github.com/vuejs-tips/vue-the-mask).

## Documentações
- [Documentação da API](https://documenter.getpostman.com/view/9111037/2s9YR56uYM)

## Check list backend
- [x] Criação da tabela Companies
- [x] Criação da tabela Users
- [x] Criação do seeder Company
- [x] Criação do seeder User
- [x] Controller Companies
    - [x] Company Controller
- [x] Request Company
    - [x] Criação da empresa
    - [x] Atualização dos dados da empresa
- [x] Resource Company
    - [x] Listagem das empresas
    - [x] Dados da empresa
    - [x] Criação da empresa
    - [x] Atualização da empresa
    - [x] Exclução da empresa
- [x] Controller Users
    - [x] User Controller
- [x] Request User
    - [x] Criação do cliente  
    - [x] Atualização dos dados do cliente
- [x] Resource User
    - [x] Listagem dos clientes
    - [x] Dados do cliente
    - [x] Criação do cliente
    - [x] Atualização do cliente
    - [x] Exclução do cliente

## Check list frontend
- [x] Rotas dos componentes
- [x] Componentes
    - [x] App
    - [x] Adicionar empresa
    - [x] Remover empresa
    - [x] Tabela das empresas
    - [x] Detalhes da empresa
        - [x] Atualizar empresa
    - [x] Adicionar cliente
    - [x] Remover cliente
    - [x] Tabela de clientes
    - [x] Detalhes do cliente
        - [x] Atualizar cliente


## Build do projeto
1. Execute os seguintes comandos na raiz do projeto:

Inicie os Contêineres
``` 
docker-compose build laravel
```
    
Inicie os contêineres:
``` 
docker-compose up -d
```

Rode o projeto:
``` 
sail npm run dev
```
