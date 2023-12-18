<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'gambar_produk',
        'harga_produk',
        'stok_produk',
        'deskripsi_produk'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produk';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_produk';

    public function headerWebsite(): HasOne
    {
        return $this->hasOne(HeaderWebsite::class, 'id_produk');
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'id_produk');
    }
}
