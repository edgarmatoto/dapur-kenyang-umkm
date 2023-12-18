<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_telepon',
        'email',
        'alamat',
        'alamat_jalan',
        'instagram',
        'facebook',
        'tiktok',
        'id_user'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kontak';

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
