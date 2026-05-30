<?php

namespace App\Filament\Resources\Pegawais\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class PegawaiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nim')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('gender')
                    ->required(),
                TextInput::make('divisi_id')
                    ->required()
                    ->numeric(),
                TextInput::make('jabatan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('tmp_lahir')
                    ->required(),
                DatePicker::make('tgl_lahir')
                    ->required(),
                TextInput::make('hp')
                    ->required(),
                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('foto')
                    ->image()
                    ->directory('foto-pegawai')
                    ->imageEditor()->maxSize(2048)->nullable(),
            ]);
    }
}
