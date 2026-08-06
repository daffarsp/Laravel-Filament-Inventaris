<?php

namespace App\Observers;

use App\Models\Barang;
use App\Models\BarangMasuk;

class BarangMasukObserver
{
    /**
     * Handle the BarangMasuk "created" event.
     */
    public function created(BarangMasuk $record): void
    {
        $this->increaseStock($record->barang_id, $record->quantity);
    }

    /**
     * Handle the BarangMasuk "updated" event.
     */
    public function updated(BarangMasuk $record): void
    {
        if ($record->wasChanged('barang_id')) {
            $this->decreaseStock($record->getOriginal('barang_id'), (int) $record->getOriginal('quantity'));
            $this->increaseStock($record->barang_id, $record->quantity);

            return;
        }

        $selisih = $record->quantity - (int) $record->getOriginal('quantity');

        if ($selisih > 0) {
            $this->increaseStock($record->barang_id, $selisih);
        } elseif ($selisih < 0) {
            $this->decreaseStock($record->barang_id, abs($selisih));
        }
    }

    /**
     * Handle the BarangMasuk "deleted" event.
     */
    public function deleted(BarangMasuk $record): void
    {
        $this->decreaseStock($record->barang_id, $record->quantity);
    }

    /**
     * Handle the BarangMasuk "restored" event.
     */
    public function restored(BarangMasuk $record): void
    {
        //
    }

    /**
     * Handle the BarangMasuk "force deleted" event.
     */
    public function forceDeleted(BarangMasuk $record): void
    {
        //
    }

    private function increaseStock(?int $barangId, int $quantity): void
    {
        if ($barangId === null || $quantity <= 0) {
            return;
        }

        Barang::query()
            ->whereKey($barangId)
            ->increment('stock', $quantity);
    }

    private function decreaseStock(?int $barangId, int $quantity): void
    {
        if ($barangId === null || $quantity <= 0) {
            return;
        }

        Barang::query()
            ->whereKey($barangId)
            ->decrement('stock', $quantity);
    }
}
