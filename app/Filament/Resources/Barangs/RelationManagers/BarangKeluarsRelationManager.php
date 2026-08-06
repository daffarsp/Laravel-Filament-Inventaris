<?php

namespace App\Filament\Resources\Barangs\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BarangKeluarsRelationManager extends RelationManager
{
    protected static string $relationship = 'barangKeluars';

    protected static ?string $title = 'Riwayat Barang Keluar';

    protected static ?string $modelLabel = 'barang keluar';

    protected static ?string $pluralModelLabel = 'riwayat barang keluar';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Kode Transaksi')
                    ->default(fn (): string => 'BK-'.now()->format('Ymd').'-'.random_int(1000, 9999))
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                TextInput::make('quantity')
                    ->label('Jumlah Keluar')
                    ->numeric()
                    ->minValue(1)
                    ->required(),

                DatePicker::make('date')
                    ->label('Tanggal Keluar')
                    ->default(now())
                    ->required(),

                Textarea::make('note')
                    ->label('Catatan')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('code')
            ->columns([
                TextColumn::make('code')
                    ->label('Kode')
                    ->searchable(),
                TextColumn::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Barang Keluar')
                    ->modalHeading('Tambah Barang Keluar'),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Ubah'),
                DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus Terpilih'),
                ]),
            ]);
    }
}
