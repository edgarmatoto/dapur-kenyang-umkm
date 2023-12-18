<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HeaderWebsite extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produk',
        'deskripsi',
        'slogan',
        'id_user',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'header_website';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
