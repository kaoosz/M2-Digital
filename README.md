composer..
git clone ..

composer install.. /
cp .env.example .env /
php artisan key:generate /

mudar o banco no arquivo da raiz 
.env //

no meu caso a porta 80 não está desponivel define a porta 8088

APP_PORT=8088

DB_CONNECTION=pgsql
DB_HOST=pgsql
DB_PORT=5432
DB_DATABASE=example_app
DB_USERNAME=sail
DB_PASSWORD=password

depois de tudo configurado, você usa comando abaixo ele ira subir a aplicação, se tiver tudo certo retorna aquilo..

comando
./vendor/bin/sail up -d

retorno esperado na criação dos containers..

[+] Running 3/3
 ⠿ Network m2-digital_sail              Created                                                                                                    0.0s
 ⠿ Container m2-digital-pgsql-1         Started                                                                                                    0.3s
 ⠿ Container m2-digital-laravel.test-1  Started 

depois que o docker criar o projeto e o banco de dados..

./vendor/bin/sail php artisan migrate

irá criar as tabelas no banco e está tudo pronto para testar a API..


Ultilizando a API



ENDPOINTS

GET recupera Listar..

http://127.0.0.1:8088/api/cidades
http://127.0.0.1:8088/api/gruposcidade
http://127.0.0.1:8088/api/campanhas
http://127.0.0.1:8088/api/produtos
http://127.0.0.1:8088/api/produtoscampanhas

POST Cadastrar ..

Grupo Cidades

começamos pelo 'Grupo Cidades' endpoint.
o segundo exemplo está com parametro defenido

http://127.0.0.1:8088/api/gruposcidade

http://127.0.0.1:8088/api/gruposcidade?grupo_nomes=Grupo 4


e depois começamos criando as 'Cidades' que precisam estár dentro de um 'Grupo Cidades'.

Cidades

http://127.0.0.1:8088/api/cidades

http://127.0.0.1:8088/api/cidades?nome=BH&id=2
![cidade_post](https://user-images.githubusercontent.com/39299613/197688972-4de6d04d-d295-4ff3-9d49-74f47747787d.png)


CAMPANHA

campanha precisa do nome da campanha e 'grupo_cidade_id' que aquela campanha
pertence o segundo link com parametros..

http://127.0.0.1:8088/api/campanhas

http://127.0.0.1:8088/api/campanhas?campanha_nome=festasz&grupo_cidade_id=3

PRODUTOS

produtos precisam de nome do produto e o desconto um numero 'inteiro'
o segundo exemplo com parametros.

http://127.0.0.1:8088/api/produtos

http://127.0.0.1:8088/api/produtos?nome=caqui&desconto=44

PRODUTOS DA CAMPANHA

depois que um 'Produto' for criado acima ele podera ser adicionado a uma campanha.
ele precisa de um nome e id do produto e id da campanha para ser criado..
o segundo exemplo tem três parametros..
produto_id
campanha_id

http://127.0.0.1:8088/api/produtoscampanhas

http://127.0.0.1:8088/api/produtoscampanhas?produto_id=2&campanha_id=2&produtos_campanha=outra


PUT Editar..

Cidades

cidades o endpoint /1 ele ira pesquisar pela cidade id 1 para update.
você pode alterar a qual Grupo cidades aquela cidade pertence
é opcional nome e id se quiser manter o nome e altera o id apenas
voce só precisa fornecer o parametro id
o segundo exemplo apenas muda o nome..

http://127.0.0.1:8088/api/cidades/1

http://127.0.0.1:8088/api/cidades/1?nome=RJx

http://127.0.0.1:8088/api/cidades/1?nome=RJx&id=2


Grupo Cidades

grupo cidades você pode apenas mudar no nome do grupo.


http://127.0.0.1:8088/api/gruposcidade/2

http://127.0.0.1:8088/api/gruposcidade/2?grupo_nomes=vale


Campanha

campanha você pode mudar qual 'grupo de cidades' e nome
estão participando daquela campanha
segundo exemplo estamos mudando nome e grupo de cidades


http://127.0.0.1:8088/api/campanhas/3

http://127.0.0.1:8088/api/campanhas/3?campanha_nome=campanha festas&grupo_cidade_id=4

Produtos

produtos você pode mudar o desconto ou o nome do produto

http://127.0.0.1:8088/api/produtos/1

http://127.0.0.1:8088/api/produtos/1?nome=bike 23&desconto=15


Produtos da Campanha

você pode alterar a qual campanha os produtos da campanha está ligado


http://127.0.0.1:8088/api/produtoscampanhas/1

http://127.0.0.1:8088/api/produtoscampanhas/1?produto_id=2&campanha_id=2


Delete Excluir..

ele automaticamente deleta a cidade..

http://127.0.0.1:8088/api/cidades/1

grupo cidade

http://127.0.0.1:8088/api/gruposcidade/2

campanha

http://127.0.0.1:8088/api/campanhas/1

produto

http://127.0.0.1:8088/api/produtos/3

produtos da campanha

http://127.0.0.1:8088/api/produtoscampanhas/1




