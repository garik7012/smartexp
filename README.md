# SmartExpert
Laravel 5.7, Bootstrap, Admin Structure

## Prepare the development environment
```shell
# git clone git@github.com ... .git ./<YOUR LOCAL FOLDER>/
# cd ./<YOUR LOCAL FOLDER>
# composer install
```
## Create database (mysql)
```shell
# mysql -u root -p
# mysql> create database db_name;
# mysql> quit;
```

## Create .env and configure the database parameters
```shell
# cp .env.example .env
# nano .env
```

and add there your db settings
```shell
...

DB_HOST=127.0.0.1
DB_DATABASE=db_name
DB_USERNAME=root
DB_PASSWORD=

...
```
## Generate a new Application key
```shell
# php artisan key:generate
Application key [<YOUR LOCAL APPLICATION KEY>] set successfully.
```

## Migrate the db structure
```shell
# php artisan migrate
Migration table created successfully.
Migrated: 2014_10_12_000000_create_users_table
Migrated: 2014_10_12_100000_create_password_resets_table
...
```

## Seeder the db structure
```shell
# php artisan db:seed
```

#How to use

### Admin side:
    /admin
 
### Admin Email:
    admin@example.com 

### Admin Password:
    secret


