<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'id_user'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tentang_kami';

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
