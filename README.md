Projeto de vendas | Hcosta

Descrição
Projeto em Ambiente Docker em PHP Laravel e banco de dados MySQL.

Os seguintes requisitos solicitados foram desenvolvidos:

Na tela de pedidos, os clientes poderão ver apenas os seus pedidos.
Na tela de pedidos, quando em cargo administrativo, o usuário poderá ver todos os pedidos e alterar seus status.
Na tela de pedidos, os usuários só poderão alterar os pedidos quando estiverem pendentes, porém usuários administrativos tem acesso ilimitado a alterações.
A lista de usuários é filtrável e ordenável por qualquer campo, com uma paginação dividida em vários valores possívels.
Os produtos estão sendo consumidos via API externa, sendo sua rota definida na variável de ambiente API_VENDAS, para fins de testes no Docker, foi utilizada a rota host.docker.internal para acessar a localhost, sendo necessário ajustar no .env.

Configuração:

- docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php82-composer:latest composer install --ignore-platform-reqs para instalar as dependências do projeto.
- Configurar o .env de forma adequada para rodar no ambiente desejado, com foco nos campos de aplicação (APP_), banco de dados (DB_) e de conexão com a API (API_).
- vendor/bin/sail up -d para subir o container do projeto.
- vendor/bin/sail artisan key:generate para gerar a chave de aplicação.
- vendor/bin/sail artisan migrate para configurar a estrutura das tabelas.
