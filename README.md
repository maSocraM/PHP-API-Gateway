# API Gateway  

## Instalação
### Docker
Basta fazer o clone deste repositório, criar um diretório **""data""** na raiz do projeto e adicionar ao arquivo hosts o a entrada **"dev.local"** apontando para o IP **127.0.0.1**.

### Serviço local
Utilizar o stack abaixo e configurar um virtual host apontando para o subdiretório "public", se for utilizado um serviço diferente do Apache Web Server, como por exemplo o NGINX, é necessário configurar as regras de rewrite similares às existentes em **"public/.htaccess"**.


#### Stack
    # PHP >= 7.x
    # Webserver (o Apache foi utilizado na criação deste)
    # Bibliotecas PHP:
        # zip
        # mysqli
        # pdo
        # pdo_mysql
        # gd
        # dom
        # json
        # xmlwriter
        # curl
        # sockets
        # exif
        # soap
        # xdebug (***FUNDAMENTAL!***)

## Configuração
    - Alterar as credenciais de acesso para o banco de dados no arquivo **"/.env"** (chaves com prefixo **"DB_"**);
    - Alterar o endereço da API remota no arquivo **"/.env"** (chaves com prefixo **"API_URL"** e **"API_PATH"**);
    - Executar os comandos no root do sistema (**"/src"**):
        - ```composer update```
        - ```chmod 777 storage -R (ou o equivalente, se sistema operacional windows)```
        - ```php artisan migrate:refresh```

Se utilizado o docker, necessário entrar no container para conseguir executar os comandos acima, que pode ser feito digitando o comando:
```docker exec -e COLUMNS="`tput cols`" -e LINES="`tput lines`" -u 1000:1000 -ti <nome_do_container> /bin/bash```

Substituindo **<nome_do_container>** pelo nome gerado pelo docker na criação dos containers.
