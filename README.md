
# Laraval Sanctum Api with Products Crud
![Logo](https://toddsmithsalter.com/content/images/2020/12/All_c0525fe15a8bd68c9fbd762831ef9959_2000.jpg)

 Example of a sanctum API with products CRUD built with the Laravel. This repo can help you to start your next project with providing a Sanctum Authentication Api with a simple crud. 

 ## Setup

Clone this repo
```shell
$ git clone https://github.com/AdnenFarhani-AOS/laraval-sanctum-api-withCrud.git
```

Install all dependency required by Laravel.
```shell
$ composer install
```

Generate app key and configure `.env` file
```shell
# create copy of .env
$ cp .env.example .env

# create Laravel key
$ php artisan key:generate
```

Next, add your database credentials in `.env` file and then run migrations.
```shell
# run migration
$ php artisan migrate 
```
Finally, run your server.
```shell
$ php artisan serve
```
