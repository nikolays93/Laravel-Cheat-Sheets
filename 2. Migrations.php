<?php
/**
 * Migrations / Миграции
 *
 * @url https://laravel.com/docs/8.x/migrations#creating-columns
 * @file database/migrations/TIMESTAMP_create_articles_table.php --create=articles
 *
 * Создать миграцию модели articles
 * $ php artisan make:migration create_articles_table
 *
 * Откатить все миграции (artisan migrate:reset) и запустить (artisan migrate)
 * $ php artisan migrate:refrash
 *
 * Откатить 2 крайние миграции
 * $ php artisan migrate:rollback --step=2
 */

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('text');
            $table->timestamps();
        });
    }
}
