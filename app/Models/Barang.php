<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $category_id
 * @property string $unit
 * @property numeric $purchase_price
 * @property numeric $selling_price
 * @property int $stock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BarangKeluar> $barangKeluars
 * @property-read int|null $barang_keluars_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BarangMasuk> $barangMasuks
 * @property-read int|null $barang_masuks_count
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang wherePurchasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereSellingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Barang extends Model
{
    protected $fillable = [
        'code',
        'name',
        'category_id',
        'unit',
        'purchase_price',
        'selling_price',
        'stock',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function barangMasuks(): HasMany
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barangKeluars(): HasMany
    {
        return $this->hasMany(BarangKeluar::class);
    }
}