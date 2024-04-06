## Учебный проект
Для запуска проекта выполните следущие команды:
```sh
git clone https://github.com/kopchan/learn-laravel10
```

```sh
cd learn-laravel10
```

```sh
composer i
```

```sh
php artisan key:generate
```

Переименуйте файл .env.example в .env и пропешите найстройки подключения к БД

```sh
php artisan migrate --seed
```
