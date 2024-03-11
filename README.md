# site_pinkside
# Projeto de Avaliação para Pós-Graduação em Desenvolvimento Web e Mobile
Este é o repositório do projeto desenvolvido para avaliação da disciplina de Desenvolvimento Web e Mobile da pós-graduação. O projeto consiste em uma aplicação simples para gerenciamento de usuários, com funcionalidades de adição, listagem e exclusão de usuários.

## Tecnologias Utilizadas

* PHP
* CodeIgniter
* MySQL
* Composer

## Passo a Passo para Executar o Projeto

### Pré-requisitos 
* PHP instalado no computador
* MySQL instalado no computador
* XAMPP instalado no computador
* Visual Studio Code (ou qualquer editor de texto de sua preferência)
* Composer instalado no computador
  
# Instalação e Configuração
* Clone o repositório em seu computador:
```
git clone https://github.com/jaquekm/site_pinkside.git
```
* Navegue até o diretório do projeto:
  ```
  cd site_pinkside
  ```
  * Instale as dependências do Composer:
   ```
   composer install
   ```
1. Instale e configure o XAMPP:

* Baixe e instale o XAMPP a partir do site oficial.
* Inicie o XAMPP e inicie os serviços Apache e MySQL
* 
2. Crie um banco de dados MySQL com o nome site_pinkside

3. Configure as credenciais do banco de dados no arquivo .env, se necessário

4. Execute a migration para criar a tabela de usuários no banco de dados:
```
php spark migrate
```
## Executando o Projeto
1. Inicie o servidor PHP embutido:
   ```
   php spark serve
   ```
2. Acesse a aplicação em seu navegador, geralmente em http://localhost:8080
3. Agora você pode adicionar, listar e excluir usuários através da interface da aplicação
      ## Licença
   Este projeto está licenciado sob a Licença MIT.
      
