<p align="center"><img src="https://prestoheads.com/assets/img/logo.png"></p>

# Laravel Nuxt Skeleton

# Install

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan jwt:secret
chmod 777 backend/storage/logs backend/bootstrap/cache backend/storage backend/storage/framework/sessions
php artisan migrate
php artisan db:seed
php artisan storage:link
npm install
npm run build # генерация билда
npm run start # запуск node сервера фронта
```

Process Manager:

```bash
pm2 delete "projectName" --silent # удаление
pm2 start npm --name "projectName" -- run start # запуск
```

# Commands
```bash
php artisan admin:make ArticleController --model=App\Models\Article # Создание контроллера
php artisan admin:create-user # создание юзера
php artisan db:seed --class=AdminUsersSeeder # создаст администратора (login: administrator, pass: ym2lPm) и модератора (login: moderator pass: KxsCfF)
php artisan admin:export-seed # экспорт сида для админ зоны

npm run dev # запуск фронта
php artisan:serve # запуск бека и админки
```

# Deploy
Первоначальная установка - `dep install staging`

Деплой на стейджинг - `dep deploy staging`


# Testing lamp1 (FrontEnd)
host: https://ssr-skeleton.lamp1.dev.prestoheads.com/

proxy: http://localhost:3001

# Testing lamp1 (BackEnd)
host: https://ssr-skeleton-back.lamp1.dev.prestoheads.com/

root: /var/www/ssr-skeleton.lamp1.dev.prestoheads.com/current/public