<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $code
 * @property int $barang_id
 * @property int $supplier_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon $date
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @property-read \App\Models\Supplier $supplier
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BarangMasuk extends Model
{
    protected $fillable = [
        'code',
        'barang_id',
        'supplier_id',
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

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
