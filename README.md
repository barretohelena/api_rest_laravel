# Api Rest Com Laravel

## Sobre o projeto

O projeto permite listar informações de todos os registro da tabela, e buscar informações de um regitro por meio da sua identificação única, através de uma API REST 
utilizando o framework Laravel, juntamente com a utilização do banco de dados MySQL. Para 
facilitar a execução do projeto localmente, foi utilizado o Docker para a geração do ambiente de 
desenvolvimento.

## Instalação e configuração
Após clonar o repositório, para a execução do projeto é necessário o [docker](https://docs.docker.com/engine/install/)
instalado e configurado na máquina.

Na raiz do projeto execute o seguinte comando
`docker compose up -d` para subir os containers do php8 com apache e mysql8.

Depois disso renomeie o arquivo `.env-example` para `.env` nesse arquivo estão as informações para a conexão com o banco de dados
e geração do token de acesso, caso não for alterado nada do container, basta renomear o arquivo e usar as mesmas informações
já contidas no arquivo, caso contrário se atente para altera-las.

Posteriormente execute o seguinte comando
`docker exec -it php_8 bash` que te levará para dentro do container.

Agora vamos executar o comando `composer install` para instalar as dependências, feito isso execute o comando `php artisan key:generate` e `php artisan jwt:secret`

Na sequência execute o comando `php artisan migrate` para a criação das tabelas no banco de dados.

E por fim execute o comando `php artisan db:seed` para inserir alguns registros de testes nas tabelas.

## Documentação
A documentação sobre a utilização dos endpoints estão aqui [documentação api_rest_laravel](http://localhost:8000/api/documentation), lembre de autorizar no swagger após obter o token. 

