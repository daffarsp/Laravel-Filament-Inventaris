<?php

namespace App\Filament\Resources\BarangKeluars;

use App\Filament\Resources\BarangKeluars\Pages\CreateBarangKeluar;
use App\Filament\Resources\BarangKeluars\Pages\EditBarangKeluar;
use App\Filament\Resources\BarangKeluars\Pages\ListBarangKeluars;
use App\Filament\Resources\BarangKeluars\Tables\BarangKeluarsTable;
use App\Models\BarangKeluar;
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

class BarangKeluarResource extends Resource
{
    protected static ?string $model = BarangKeluar::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentArrowUp;

    protected static ?string $navigationLabel = 'Barang Keluar';

    protected static string|UnitEnum|null $navigationGroup = 'Transaksi';

    protected static ?int $navigationSort = 2;

    protected static ?string $modelLabel = 'barang keluar';

    protected static ?string $pluralModelLabel = 'data barang keluar';

    protected static ?string $recordTitleAttribute = 'code';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('code')
                ->label('Kode Transaksi')
                ->default(fn (): string => 'BK-'.now()->format('Ymd').'-'.random_int(1000, 9999))
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),

            Select::make('barang_id')
                ->label('Barang')
                ->relationship('barang', 'name')
                ->searchable()
                ->preload()
                ->required(),

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

    public static function table(Table $table): Table
    {
        return BarangKeluarsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBarangKeluars::route('/'),
            'create' => CreateBarangKeluar::route('/create'),
            'edit' => EditBarangKeluar::route('/{record}/edit'),
        ];
    }
}
