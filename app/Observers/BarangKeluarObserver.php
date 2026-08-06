<?php

namespace App\Observers;

use App\Models\Barang;
use App\Models\BarangKeluar;

class BarangKeluarObserver
{
    /**
     * Handle the BarangKeluar "created" event.
     */
    public function created(BarangKeluar $record): void
    {
        $this->decreaseStock($record->barang_id, $record->quantity);
    }

    /**
     * Handle the BarangKeluar "updated" event.
     */
    public function updated(BarangKeluar $record): void
    {
        if ($record->wasChanged('barang_id')) {
            $this->increaseStock($record->getOriginal('barang_id'), (int) $record->getOriginal('quantity'));
            $this->decreaseStock($record->barang_id, $record->quantity);

            return;
        }

        $selisih = $record->quantity - (int) $record->getOriginal('quantity');

        if ($selisih > 0) {
            $this->decreaseStock($record->barang_id, $selisih);
        } elseif ($selisih < 0) {
            $this->increaseStock($record->barang_id, abs($selisih));
        }
    }

    /**
     * Handle the BarangKeluar "deleted" event.
     */
    public function deleted(BarangKeluar $record): void
    {
        $this->increaseStock($record->barang_id, $record->quantity);
    }

    /**
     * Handle the BarangKeluar "restored" event.
     */
    public function restored(BarangKeluar $record): void
    {
        //
    }

    /**
     * Handle the BarangKeluar "force deleted" event.
     */
    public function forceDeleted(BarangKeluar $record): void
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
