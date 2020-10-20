<?php
/**
 * Routes / Запросы (Пути)
 *
 * @url https://laravel.com/docs/8.x/routing
 * @file routes/api.php или routes/web.php
 *
 * Сгенерировать контроллер ArticleController
 * $ php artisan make::controller ArticleController
 */

use App\Http\Controllers\ArticleController;

// Добавить запрос /article (запускать метод index контроллера ArticleController)
Route::get('article/', [ArticleController::class, 'index']);

/** @var array Методы запросов */
$methods = ['get', 'post', 'put', 'patch', 'delete', 'options'];
// Добавить запрос с методами и отправить параметр в функцию/метод (к примеру /article/2 вернет 2)
Route::match($methods, 'article/{id}', function ($id) { return $id; });
