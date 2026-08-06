<?php

namespace App\Filament\Widgets;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Filament\Widgets\ChartWidget;

class StokChart extends ChartWidget
{
    protected static ?int $sort = -4;

    protected int|string|array $columnSpan = 'full';

    protected ?string $heading = 'Grafik Stok';

    protected ?string $description = 'Pergerakan barang masuk dan keluar selama 6 bulan terakhir.';

    protected function getData(): array
    {
        $labels = [];
        $masuk = [];
        $keluar = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->startOfMonth()->subMonths($i);

            $labels[] = $date->format('M Y');

            $masuk[] = (int) BarangMasuk::query()
                ->whereBetween('date', [
                    $date->copy()->startOfMonth()->toDateString(),
                    $date->copy()->endOfMonth()->toDateString(),
                ])
                ->sum('quantity');

            $keluar[] = (int) BarangKeluar::query()
                ->whereBetween('date', [
                    $date->copy()->startOfMonth()->toDateString(),
                    $date->copy()->endOfMonth()->toDateString(),
                ])
                ->sum('quantity');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Barang Masuk',
                    'data' => $masuk,
                    'borderColor' => '#16a34a',
                    'backgroundColor' => 'rgba(22, 163, 74, 0.12)',
                    'tension' => 0.35,
                ],
                [
                    'label' => 'Barang Keluar',
                    'data' => $keluar,
                    'borderColor' => '#dc2626',
                    'backgroundColor' => 'rgba(220, 38, 38, 0.12)',
                    'tension' => 0.35,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
