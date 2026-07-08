<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mysql_main';

    public function up(): void
    {
        if (!Schema::connection($this->connection)->hasTable('blog_posts')) {
            Schema::connection($this->connection)->create('blog_posts', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('excerpt', 500)->nullable()->comment('Ringkasan singkat untuk list & meta');
                $table->longText('content')->comment('Isi artikel dalam HTML');
                $table->string('thumbnail', 500)->nullable()->comment('Path storage/app/public');
                $table->foreignId('category_id')->nullable()
                    ->constrained('blog_categories')->nullOnDelete();
                $table->string('meta_title', 200)->nullable();
                $table->string('meta_description', 300)->nullable();
                $table->string('tags')->nullable()->comment('Pisahkan dengan koma');
                $table->boolean('is_published')->default(false);
                $table->boolean('is_featured')->default(false)->comment('Tampilkan di posisi featured');
                $table->timestamp('published_at')->nullable();
                $table->unsignedBigInteger('author_id')->nullable();
                $table->unsignedInteger('views')->default(0);
                $table->timestamps();

                $table->index('is_published');
                $table->index('is_featured');
                $table->index('published_at');
                $table->index('category_id');
                $table->fullText(['title', 'excerpt', 'content']);
            });
        }
    }

    public function down(): void
    {
        Schema::connection($this->connection)->dropIfExists('blog_posts');
    }
};
