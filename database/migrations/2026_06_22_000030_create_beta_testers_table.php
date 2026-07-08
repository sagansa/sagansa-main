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
        if (!Schema::connection($this->connection)->hasTable('beta_testers')) {
            Schema::connection($this->connection)->create('beta_testers', function (Blueprint $table) {
                $table->id();
                $table->string('email')->unique();
                $table->enum('app', ['pos', 'attendance', 'both'])->default('both');
                $table->enum('status', ['pending', 'invited', 'active', 'unsubscribed'])->default('pending');
                $table->timestamp('invited_at')->nullable();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->timestamps();

                $table->index('status');
                $table->index('app');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection($this->connection)->dropIfExists('beta_testers');
    }
};
