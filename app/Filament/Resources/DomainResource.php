<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DomainResource\Pages;
use App\Filament\Resources\DomainResource\RelationManagers;
use App\Jobs\Check\GetInfo;
use App\Jobs\Expired\GetTariffs;
use App\Jobs\Majestic\MajesticCheckData;
use App\Models\Domain;
use App\Tables\Columns\PriceColumn;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class DomainResource extends Resource
{
    protected static ?string $model = Domain::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\TextInput::make('data.tic')
                    ->numeric(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('data.tic')
                    ->label('tic')
                    ->numeric()
//                    ->sortable(query: function (Builder $query, string $direction): Builder {
//                        return $query
//                            ->orderBy('data->tic', $direction);
//                    }),
                ->sortable(),

            ])
            ->defaultSort('data->trustTic', 'desc')
            ->filters([
                Tables\Filters\Filter::make('tic>0')
                    ->query(fn (Builder $query): Builder => $query->where('data->tic','>', 0))->default(),
            ])
            ->actions([


            ])
            ->bulkActions([



            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDomains::route('/'),
            'create' => Pages\CreateDomain::route('/create'),
            'edit' => Pages\EditDomain::route('/{record}/edit'),
        ];
    }
}
