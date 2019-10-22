## Instale as dependencias da aplicação aplicativo

composer install

## Iniciar a aplicação

Pode ser iniciado atravez de Docker com o comadno

cd [diretorio do projeto] 
docker-composer up -d

ou utilizando o server do php 

composer start


##Rotas de uso

Ver todos os deputados
http://localhost:8080/todos/deputados


Ver verbas de deputado 
http://localhost:8080/verba/deputado/26153


Ver top 5 deputados que mais gastam
http://localhost:8080/top/5/deputados