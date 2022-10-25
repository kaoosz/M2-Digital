

endpoints

GET recupera Listar..

http://127.0.0.1:8088/api/cidades
http://127.0.0.1:8088/api/gruposcidade
http://127.0.0.1:8088/api/campanhas
http://127.0.0.1:8088/api/produtos
http://127.0.0.1:8088/api/produtoscampanhas

POST Cadastrar ..

Grupo Cidades

começamos por grupo cidades criamos um 'grupo de cidades' Primeiro,
o segundo exemplo com parametro defenido

http://127.0.0.1:8088/api/gruposcidade

http://127.0.0.1:8088/api/gruposcidade?grupo_nomes=Grupo 4


e depois começamos criando as Cidades que precisam estár dentro de um 'Grupo Cidade'
adiciona foto e delta isso

Cidades

http://127.0.0.1:8088/api/cidades

http://127.0.0.1:8088/api/cidades?nome=BH&id=2

CAMPANHA

campanha precisa do nome da campanha e grupo cidade que aquela campanha
pertence o segundo link com parametros..

http://127.0.0.1:8088/api/campanhas

http://127.0.0.1:8088/api/campanhas?campanha_nome=festasz&grupo_cidade_id=3

PRODUTOS

produtos precisam de nome do produto e o desconto um numero 'inteiro'
o segundo exemplo com parametros.

http://127.0.0.1:8088/api/produtos

http://127.0.0.1:8088/api/produtos?nome=caqui&desconto=44

PRODUTOS DA CAMPANHA

depois que um produto for cadastrado ele podera ser adicionado a uma campanha.
ele precisa do nome o id do produto e id da campanha para ser criado..
o segundo exemplo tem três parametros..

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




