<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mysql_main';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::connection($this->connection)->hasTable('features')) {
            Schema::connection($this->connection)->create('features', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('short_description', 500);
                $table->string('icon', 50)->default('✨')->comment('Emoji fallback jika tidak ada gambar');
                $table->string('color', 30)->default('blue')->comment('Kelas warna: blue, green, purple, dst.');
                $table->string('image_path', 500)->nullable()->comment('Path relatif storage/app/public');
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
                $table->timestamps();

                $table->index('is_active');
                $table->index('sort_order');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection($this->connection)->dropIfExists('features');
    }
};
