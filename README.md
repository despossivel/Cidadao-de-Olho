# Cidadão de Olho

##### O desenvolvimento da API surgui com a necessidade da população de monitorar os gastos feitos por deputados atraves de verbas indenizatórias, para isso a ALMG fornece essas informações em uma API publica na qual está sendo consumida para popular o banco de dados da aplicação, com isso é feito uma analise das datas na qual foram solicitadas as verbas indenizatórias. Com isso um TOP5 mensal dos deputados que mais gastaram é levantado. A aplicação foi modulada utilizando a arquitetura MVC, escrita em PHP sobre framewrok Slim 3. Foi escolhido um banco relacional(Apesar que um não relacional ser mais pratico para manipular o formato dos objetos das requisições da ALMG) MySql, o script para criação do mesmo segue na pasta DB e no diretorio "src" é possivel encontrar o ".env"  onde as informaçoes para conexão com o banco de dados devem ser setadas.

### Instale as dependencias da aplicação

composer install

### Carregue as classes no autoload 

composer reloadAutoload

### Iniciar a aplicação

composer start

### [Documentação](http://localhost:8080/documentacion/index.html)

## OBS:
#### Execute a rota /todos/deputados inicialmente para popular o banco de dados