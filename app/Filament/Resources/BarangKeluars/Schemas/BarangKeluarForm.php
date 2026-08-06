<?php

namespace App\Filament\Resources\BarangKeluars\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BarangKeluarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Kode Transaksi')
                    ->required(),
                Select::make('barang_id')
                    ->label('Barang')
                    ->relationship('barang', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('quantity')
                    ->label('Jumlah Keluar')
                    ->required()
                    ->numeric(),
                DatePicker::make('date')
                    ->label('Tanggal Keluar')
                    ->required(),
                Textarea::make('note')
                    ->label('Catatan')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
