## Instale as dependencias da aplicação aplicativo

composer install

## Iniciar a aplicação

Pode ser iniciado atravez de Docker com o comadno

cd [diretorio do projeto] 
docker-composer up -d

ou utilizando o server do php 

composer start


###Rotas de uso

Ver todos os deputados
http://localhost:8080/todos/deputados


Ver verbas de deputado (informando o id do deputado)
http://localhost:8080/verba/deputado/{idDeputado}


Ver todas as verbas
http://localhost:8080/verbas/todas


Ver um ranking de todos os periodos
http://localhost:8080/verbas/todas/ranking


Ver ranking top 5 por mes (informando a numeração do mes ex: 2 ou 02 para fevereiro)
http://localhost:8080/verbas/top5/{mes}
