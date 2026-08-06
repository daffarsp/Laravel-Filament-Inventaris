<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $code
 * @property int $barang_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon $date
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BarangKeluar extends Model
{
    protected $fillable = [
        'code',
        'barang_id',
        'quantity',
        'date',
        'note',
    ];

    protected $casts = [
        'date' => 'date',
        'quantity' => 'integer',
    ];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
