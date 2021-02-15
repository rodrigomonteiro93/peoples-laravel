Crud peoples em laravel + jquery

Instalação e inicialização do projeto

    Clonar o repositório github
    Acessar a pasta raiz do projeto e executar o comando "composer install" para gerar a pasta vendor do projeto
    Inicie o servidor com o comando "php artisan serve" - http://localhost:8000/

Configurar database

    Criar um banco de dados para o projeto com base no arquivo base.sql localizado na raiz do repositorio
    Editar o arquivo .env na raiz do projeto
    preencher as configurações do database: https://prnt.sc/zlhzrc
    
Executar Tests

    - Rotas e views
    - Criação, alteração e exclusão registros via controller
    - Criação de registros via seeder
    - Exclusão de todos os registros gerados ( truncate table pessoa )
    Comando:    
    ./vendor/bin/phpunit
    
Executar cadastro de seed (para gerar registros fakes)

    php artisan db:seed
    
Técnologias

    Laravel framework
    Jquery
    Bootstrap 4
    Tests phpUnit
    
Prints em funcionamento

    https://prnt.sc/zln02q
    https://prnt.sc/zln4tw
    https://prnt.sc/zln6jp

Por Rodrigo Monteiro
