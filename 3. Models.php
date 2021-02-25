<?php
/**
 * @url https://laravel.com/docs/8.x/eloquent#defining-models
 * @file app/Models/Article.php
 *
 * Создать модель Article с миграциями
 * $ php artisan make:model Article -m
 */

use App\Post;
use Illuminate\Database\Eloquent\Model;

/**
 * Получение всех записей таблицы
 * SELECT * FROM posts
 */
$allPosts = Post::all();

/**
 * Получение записей с полем статус больше 0
 * SELECT * FROM posts WHERE status > 0
 */
$posts = Post::where('status', '>', 0)->get();

/**
 * SELECT * FROM posts WHERE status IN [1, 2, 3]
 */
$posts = Post::whereIn('status', [1, 2, 3])->get();

$freshPost = Post::min('updated_at');

/**
 * Получение записи по первичному ключу
 * SELECT * FROM posts WHERE id = 1
 */
$postId = 1;
$post = Post::find($postId ?? [1, 2, 3]);

/**
 *
 */
Post::findOrFail($postId);

/**
 * SELECT * FROM posts ORDER BY sort
 */
Post::orderBy('sort', 'desc')->get();

/**
 * Обновить / Добавить запись
 */
$post = new Post();
$post->name = 'Post title';
$post->body = 'Post description content.';
$post->save();


class User extends Model
{
	const STATUSES = [
		0 => 'Deactivate',
		1 => 'Activated',
	];

	/**
	 * Scope (Snippet)
	 */
	public function scopeActive($query, ...$args)
	{
		return $query
			->where('status', '>', 0)
			->whereAnd('active', '=', 1);
	}

	/**
	 * Аксессор (Getter) get{$1}Attribute
	 */
	public function getStatusAttribute()
	{
		return static::STATUSES[$this->status];
	}

	/**
	 * Мутатор (Setter) set{$1}Attribute
	 */
	public function setTitleAttribute($value)
	{
		return $this->attributes['title'] = ucfirst(trim($value));
	}
}

/**
 * Работа с датой (\Carbon\Carbon)
 */
$post->created_at->format('d.m.Y');
