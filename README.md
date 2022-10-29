<p align="center">
  <br>
  <img alt="m2 logo" width="100" src="https://media-exp1.licdn.com/dms/image/C4D0BAQHWSzDi11zMow/company-logo_200_200/0/1630935747067?e=1675296000&v=beta&t=bSW-tmbgzLag7bJ7m8pjYHU27gH0KJBdRNAv2bxGs9c"/>
  <br>
</p>



# Instruções

Após a cópia, clone o repositório localmente:
```
https://github.com/kaoosz/M2-Digital.git
```
Instale todas as dependências
```
composer install
```
crie um aquivo .env para configuaração
```
cp .env.example .env
```
gere uma chave unica indentificadora.
```
php artisan key:generate
```

depois de tudo configurado no .env na raiz do projeto, é hora de subir o Docker com comando abaixo irá baixar os Containers necessarios.

```
./vendor/bin/sail up -d
```

retorno esperado na criação dos containers..
```
[+] Running 3/3
 ⠿ Network m2-digital_sail              Created                                                                                                    0.0s
 ⠿ Container m2-digital-pgsql-1         Started                                                                                                    0.3s
 ⠿ Container m2-digital-laravel.test-1  Started 
```
depois que o docker criar o projeto e o banco de dados..

```
./vendor/bin/sail php artisan migrate
```

irá criar as tabelas no banco e está tudo pronto para testar a API..


Ultilizando a API


# Endpoints

## GET Listar (GET)
> `http://127.0.0.1:8088/api/cidades`  
> `http://127.0.0.1:8088/api/gruposcidade`  
> `http://127.0.0.1:8088/api/campanhas`  
> `http://127.0.0.1:8088/api/produtos`  
> `http://127.0.0.1:8088/api/produtoscampanhas`

## Post Cadastrar (POST)

Grupo Cidades

começamos pelo criando 'Grupo Cidades'.
o segundo exemplo está com parametro defenido


> `http://127.0.0.1:8088/api/gruposcidade`

> `http://127.0.0.1:8088/api/gruposcidade?grupo_nomes=Grupo 4`


e depois criamos as 'Cidades' que precisam estár dentro de um 'Grupo Cidades'.

Cidades

> `http://127.0.0.1:8088/api/cidades`

> `http://127.0.0.1:8088/api/cidades?nome=BH&id=2`

CAMPANHA

campanha precisa do nome da campanha e 'grupo_cidade_id', que participara daquela campanha
o segundo link com parametros..

> `http://127.0.0.1:8088/api/campanhas`

> `http://127.0.0.1:8088/api/campanhas?campanha_nome=festasz&grupo_cidade_id=3`

PRODUTOS

produtos precisam de nome do produto e o desconto um numero 'inteiro'
o segundo exemplo com parametros.

> `http://127.0.0.1:8088/api/produtos`

> `http://127.0.0.1:8088/api/produtos?nome=caqui&desconto=44`

PRODUTOS DA CAMPANHA

depois que um 'Produto' for criado acima ele podera ser adicionado a uma campanha.
ele precisa de um 'nome','id do produto','id da campanha' para ser criado..
o segundo exemplo tem três parametros..
produto_id
campanha_id

> `http://127.0.0.1:8088/api/produtoscampanhas`

> `http://127.0.0.1:8088/api/produtoscampanhas?produto_id=2&campanha_id=2&produtos_campanha=outra`

parei aqui
PUT Editar..

Cidades
## Put Editar (PUT)

cidades o endpoint /1 ele ira pesquisar pela cidade id 1 para update.
você pode alterar a qual 'Grupo Cidades' aquela cidade pertence
é opcional 'nome' e 'id' se quiser manter o nome e altera o id apenas
voce só precisa fornecer o parametro id
o segundo exemplo apenas muda o nome..

> `http://127.0.0.1:8088/api/cidades/1`

> `http://127.0.0.1:8088/api/cidades/1?nome=RJx`

> `http://127.0.0.1:8088/api/cidades/1?nome=RJx&id=2`


Grupo Cidades

O 'Grupo Cidades' você pode apenas mudar o nome do grupo.


> `http://127.0.0.1:8088/api/gruposcidade/2`

> `http://127.0.0.1:8088/api/gruposcidade/2?grupo_nomes=vale`


Campanha    // parei aqui

Na campanha você pode mudar qual 'Grupo de Cidades' e 'nome'
estão participando daquela campanha
segundo exemplo estamos mudando nome e grupo de cidades


> `http://127.0.0.1:8088/api/campanhas/3`

> `http://127.0.0.1:8088/api/campanhas/3?campanha_nome=campanha festas&grupo_cidade_id=4`

Produtos

produtos você pode mudar o desconto ou o nome do produto

> `http://127.0.0.1:8088/api/produtos/1`

> `http://127.0.0.1:8088/api/produtos/1?nome=bike 23&desconto=15`


Produtos da Campanha

você pode alterar a qual campanha os produtos da campanha está ligado


> `http://127.0.0.1:8088/api/produtoscampanhas/1`

> `http://127.0.0.1:8088/api/produtoscampanhas/1?produto_id=2&campanha_id=2`


Delete Excluir..

ele automaticamente deleta a cidade..

> `http://127.0.0.1:8088/api/cidades/1`  

> `http://127.0.0.1:8088/api/gruposcidade/2`  

> `http://127.0.0.1:8088/api/campanhas/1`  

> `http://127.0.0.1:8088/api/produtos/3`  

> `http://127.0.0.1:8088/api/produtoscampanhas/1`  




