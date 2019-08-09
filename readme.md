1. configuram conexiunea cu DB

DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite


2. pregatim baza de date
    - migrations

    migrare - un script care indica cum sa instalaeza/desinstaleaza o structura  intr-o baza de date


* NOTA 
ca sa automatizam procesele in Laravel vom utiliza
artizan(tool commnad line)

cu PHP artisan make:migration create_products_table

migram structura in baza date


s-au creat "products" - migrarea noastra
a fost migrat


Pregatim modele corespunzatoare


HOMEWORK
in modul Currenty rata de schimb fata
de creat CUrrency controler /currencies/import ->  CUrrencyController@import  https://fixer.io/

https://packagist.org/packages/fadion/fixerio


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vanar
DB_USERNAME=root
DB_PASSWORD=