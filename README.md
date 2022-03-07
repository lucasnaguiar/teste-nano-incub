# Sistema de gerenciamento de bonificação de funcionários

## Sobre o projeto

Este projeto foi criado com base nas especificações fornecidas para o processo seletivo da empresa Nano Incub. Onde o mesmo mostra por meio de um sistema de gestão de bônus de usuário como utilizar recursos do Laravel para desenvolver essa solução.

O projeto foi criado utilizando as seguintes tecnologias:

Laravel Sail (Docker/Docker Compose) com
- Laravel v9.x
- Laravel Blade e Alpine.js
- Bootstrap 5.1
- MySQL
- PHP 8.1


### Observações:

Considerei utilizar repository pattern para melhor implementação da camada de banco de dados, mas não quis extender mais o tempo de envio do teste já bastante alongado por questões pessoais, optei por simplesmente ganhar tempo usando o máximo de recursos do Eloquent que achei serem úteis para essa solução, ainda que na camada Controller.

No cadastro de movimentações, o preenchimento do funcionário é feito dinamicamente através de uma busca digitando o nome ou login do funcionário. Gostaria de fazer usando Vue.js mas optei por usar Alpine.js que permite fazer isso ao lado do Laravel Blade, requisitado para esse teste. 

A funcionalidade de deletar um funcionário está disponível ao visualizar os dados do funcionário. Para esta funcionalidade usei soft delete, o que hipoteticamente pemitiria que os dados do funcionário fossem restaurados, no entanto, as movimentações de bonus relacionadas a ele são de fato deletadas. 

## Executando o projeto

Para começar é preciso instalar as dependências do projeto, após esse passo poderemos gerenciar todo o projeto usando Docker através do Laravel Sail. 

```
composer install
```
Caso não tenha o composer instalado na máquina, pode ser executado atráves do docker com o comando:
```
docker run --rm -v $(pwd):/app -w /app composer install
```

Agora crie um arquivo .env na pasta do projeto e parametrize com os dados do banco:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

Quando 'subir' os containers usando o Laravel Sail, ele vai usar esses dados para configurar o container do database, por isso deve ser feito antes do comando a seguir. Podemos subir agora com o comando (sempre dentro da pasta do projeto): 

```
./vendor/bin/sail up
```

Em alguns segundos o projeto já estará rodando localmente em 
http://127.0.0.1:80. Agora, outro terminal, você deve gerar a chave de criptografia do projeto e executar as migrations e seeders, sempre usando o Laravel Sail.

```
./vendor/bin/sail artisan key:generate
```
```
./vendor/bin/sail artisan migrate --seed
```

O banco será populado com dados fakes de funcionários e movimentações de bônus para melhor testar as funcionalidades de busca e paginação. 

### Acesso

Um usuário admin será criado, permitindo login com os dados:
```
Login: nanoincub
Senha: teste@123
```


