<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleItemsResource\Pages;
use App\Filament\Resources\SaleItemsResource\RelationManagers;
use App\Models\sale_item;
use App\Models\product;
use App\Models\sale;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SaleItemsResource extends Resource
{
    protected static ?string $model = sale_item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Sale Items';
    protected static ?string $navigationGroup = 'Inventory';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('sale_id')
                    ->label('Sale')
                    ->options(sale::all()->pluck('id', 'id'))
                    ->required(),
                Select::make('product_id')
                    ->label('Product')
                    ->options(product::all()->pluck('product_name', 'id'))
                    ->required(),
                TextInput::make('quantity')
                    ->numeric()
                    ->required()
                    ->minValue(1),
                TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->minValue(0.01)
                    ->label('Price (per item)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sale_id')->label('Sale ID')->sortable(),
                Tables\Columns\TextColumn::make('product.product_name')->label('Product')->sortable(),
                Tables\Columns\TextColumn::make('quantity')->sortable(),
                Tables\Columns\TextColumn::make('price')->label('Price')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListSaleItems::route('/'),
            'create' => Pages\CreateSaleItems::route('/create'),
            'edit' => Pages\EditSaleItems::route('/{record}/edit'),
        ];
    }
}
