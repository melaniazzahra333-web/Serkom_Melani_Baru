<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ekstrakurikuler extends Model
{
    protected $table = 'ekstrakurikuler';

    protected $primaryKey = 'id_eskul';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_eskul',
        'nama_eskul',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];

    protected static function boot() //membuat id otomatis menggunakan UUID saat membuat data baru
    {
        parent::boot();

        static::creating(function ($eskul) {
             // Jika ID belum ada, buat ID menggunakan UUID
            if (!$eskul->id_eskul) {
                $eskul->id_eskul = (string) Str::uuid();
            }
        });
    }
}
