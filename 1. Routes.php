<?php
/**
 * Routes / Запросы (Пути)
 *
 * @url https://laravel.com/docs/8.x/routing
 * @file routes/api.php или routes/web.php
 *
 * Сгенерировать контроллер ArticleController
 * $ php artisan make::controller ArticleController
 *
 * Показать таблицу всех возможных запросов
 * $ php artisan route:list
 */

use App\Http\Controllers\ArticleController;

// Добавить запрос /articles (запускать метод index контроллера ArticleController)
Route::get('articles/', [ArticleController::class, 'list'])->name('article.list');

/** @var array Методы запросов */
$methods = ['get', 'post', 'put', 'patch', 'delete', 'options'];
// Добавить запрос с методами и отправить параметр в функцию/метод (к примеру /article/2 вернет 2)
Route::match($methods, 'article/{id}', function ($id) {
    // Передать параметр $id в подключаемый шаблон (view: resources/views/article/element.blade.php)
    return view('article.element', compact(['id']));
})->name('article.element');

// При обращении к article (без указания ID), отправить на список (301 Moved permanently, default: 302 Found)
// Эквивалентно: Route::permanentRedirect('/article', '/articles');
Route::redirect('/article', '/articles', 302);

/**
 * Получить ссылку на статью
 *
 * @param  string $id ID статьи ссылку на которую нужно получить
 * @return string     Ссылка на статью к пр. http://example.com/post/1?search=rocket
 */
function getArticlePermalink($id) {
    // Сгенерировать и вернуть ссылку запроса с именем article.show
    // Если передать не входящий в запрос параметр (search) он добавится как get запрос
    return route('article.element', ['id' => $id, 'search' => 'rocket']);
}
