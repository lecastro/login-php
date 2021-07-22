# Login PHP

## Configurando ambiente de dev
```shell script
# Instalar o xamp PHP(7.2 +) & mysql
xamp: https://www.apachefriends.org/download.html


# Adicionar Um banco no mysql com as seguintes conexão, ou você pode alterar no source/Config.php.
# Depois execute o script do dump localizado na dump/kabum_test.sql

'host'      = '127.0.0.1',
'database'  = 'kabum_test',
'username'  = 'root',
'password'  = 'root',
```

## Clonar o repositorio
```shell script

# executar esse commando na pasta htdocs
git clone https://github.com/lecastro/login-php.git

#Agora pegue o link do seu localhost é copie e cole na variavel de ambiente que fica no arquivo source/Config.php Ex:
'root' = 'http://localhost/login-php'

```