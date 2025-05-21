<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BeasiswaResource\Pages;
use App\Models\Beasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\UrlInput;

class BeasiswaResource extends Resource
{
    protected static ?string $model = Beasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('nama')->required()->maxLength(255),
            Textarea::make('deskripsi'),
            TextInput::make('jenis'),
            DatePicker::make('tanggal_mulai'),
            DatePicker::make('tanggal_selesai'),
            Textarea::make('syarat'),
            Textarea::make('manfaat'),
            TextInput::make('link_pendaftaran')->url()->maxLength(255),
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('jenis'),
                TextColumn::make('tanggal_mulai')->date('d M Y'),
                TextColumn::make('tanggal_selesai')->date('d M Y'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeasiswas::route('/'),
            'create' => Pages\CreateBeasiswa::route('/create'),
            'edit' => Pages\EditBeasiswa::route('/{record}/edit'),
        ];
    }
}
