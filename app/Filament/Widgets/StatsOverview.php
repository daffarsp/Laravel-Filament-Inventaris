<?php

namespace App\Filament\Widgets;

use App\Models\Barang;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = -5;

    protected function getStats(): array
    {
        $totalBarang = Barang::query()->count();
        $totalKategori = Category::query()->count();
        $stokMenipis = Barang::query()
            ->where('stock', '<=', 10)
            ->count();

        return [
            Stat::make('Total Barang', number_format($totalBarang))
                ->description('Jumlah seluruh barang')
                ->color('primary'),

            Stat::make('Total Kategori', number_format($totalKategori))
                ->description('Jumlah kategori barang')
                ->color('success'),

            Stat::make('Stok Menipis', number_format($stokMenipis))
                ->description('Stok <= 10')
                ->color('danger'),
        ];
    }
}
