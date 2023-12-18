<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'skor_bintang',
        'deskripsi',
        'foto',
        'id_user'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'testimoni';

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
