<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mysql_main';

    public function up(): void
    {
        if (!Schema::connection($this->connection)->hasTable('blog_categories')) {
            Schema::connection($this->connection)->create('blog_categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->string('color', 30)->default('blue');
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
                $table->timestamps();

                $table->index('is_active');
                $table->index('sort_order');
            });
        }
    }

    public function down(): void
    {
        Schema::connection($this->connection)->dropIfExists('blog_categories');
    }
};
