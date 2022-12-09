PROJETO 'PROJECT2'

1 - CRIAR BASE POSTGRESQL:

CREATE DATABASE "project2"
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;
   
..............................

2 - Arquivo .env:

APP_NAME=Project2
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=project2
DB_USERNAME=postgres
DB_PASSWORD=123

..............................
