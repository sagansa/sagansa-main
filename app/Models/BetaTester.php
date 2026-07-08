<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BetaTester extends Model
{
    /**
     * Koneksi database khusus konten marketing.
     */
    protected $connection = 'mysql_main';

    protected $fillable = [
        'email',
        'app',
        'status',
        'invited_at',
        'ip_address',
        'user_agent',
    ];

    protected function casts(): array
    {
        return [
            'invited_at' => 'datetime',
        ];
    }

    /**
     * Scope: tester yang belum diundang.
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope: tester yang sudah diundang ke Play Console.
     */
    public function scopeInvited(Builder $query): Builder
    {
        return $query->where('status', 'invited');
    }

    /**
     * Scope: tester yang sudah aktif mencoba.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    /**
     * Label deskriptif untuk app.
     */
    public function getAppLabelAttribute(): string
    {
        return match ($this->app) {
            'pos' => 'POS',
            'attendance' => 'Attendance',
            'both' => 'POS + Attendance',
            default => $this->app,
        };
    }

    /**
     * Label warna badge untuk status.
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'gray',
            'invited' => 'blue',
            'active' => 'green',
            'unsubscribed' => 'gray',
            default => 'gray',
        };
    }
}
