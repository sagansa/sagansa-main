<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mysql_main';

    public function up(): void
    {
        if (!Schema::connection($this->connection)->hasTable('vlogs')) {
            Schema::connection($this->connection)->create('vlogs', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->string('youtube_id', 20)->comment('11 karakter ID video YouTube');
                $table->string('youtube_url', 500)->nullable()->comment('URL lengkap untuk referensi');
                $table->string('thumbnail', 500)->nullable()->comment('Custom thumbnail, fallback ke YouTube');
                $table->string('category')->nullable()->comment('Kategori bebas (string)');
                $table->string('duration', 10)->nullable()->comment('Format mm:ss atau hh:mm:ss');
                $table->boolean('is_published')->default(false);
                $table->boolean('is_featured')->default(false);
                $table->timestamp('published_at')->nullable();
                $table->unsignedInteger('views')->default(0);
                $table->timestamps();

                $table->index('is_published');
                $table->index('is_featured');
                $table->index('published_at');
                $table->index('category');
            });
        }
    }

    public function down(): void
    {
        Schema::connection($this->connection)->dropIfExists('vlogs');
    }
};
