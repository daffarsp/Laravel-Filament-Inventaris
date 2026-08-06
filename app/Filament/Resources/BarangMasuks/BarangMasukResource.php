<?php

namespace App\Filament\Resources\BarangMasuks;

use App\Filament\Resources\BarangMasuks\Pages\CreateBarangMasuk;
use App\Filament\Resources\BarangMasuks\Pages\EditBarangMasuk;
use App\Filament\Resources\BarangMasuks\Pages\ListBarangMasuks;
use App\Filament\Resources\BarangMasuks\Tables\BarangMasuksTable;
use App\Models\BarangMasuk;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BarangMasukResource extends Resource
{
    protected static ?string $model = BarangMasuk::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentArrowDown;

    protected static ?string $navigationLabel = 'Barang Masuk';

    protected static string|UnitEnum|null $navigationGroup = 'Transaksi';

    protected static ?int $navigationSort = 1;

    protected static ?string $modelLabel = 'barang masuk';

    protected static ?string $pluralModelLabel = 'data barang masuk';

    protected static ?string $recordTitleAttribute = 'code';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('code')
                ->label('Kode Transaksi')
                ->default(fn (): string => 'BM-'.now()->format('Ymd').'-'.random_int(1000, 9999))
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            Select::make('barang_id')
                ->label('Barang')
                ->relationship('barang', 'name')
                ->searchable()
                ->preload()
                ->required(),

            Select::make('supplier_id')
                ->label('Supplier')
                ->relationship('supplier', 'name')
                ->searchable()
                ->preload()
                ->required(),

            TextInput::make('quantity')
                ->label('Jumlah Masuk')
                ->numeric()
                ->minValue(1)
                ->required(),

            DatePicker::make('date')
                ->label('Tanggal Masuk')
                ->default(now())
                ->required(),

            Textarea::make('note')
                ->label('Catatan')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return BarangMasuksTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBarangMasuks::route('/'),
            'create' => CreateBarangMasuk::route('/create'),
            'edit' => EditBarangMasuk::route('/{record}/edit'),
        ];
    }
}
