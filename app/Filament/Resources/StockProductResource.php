<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StockProductResource\Pages;
use App\Filament\Resources\StockProductResource\RelationManagers;
use App\Models\stock_product;
use App\Models\product;
use App\Models\stock;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StockProductResource extends Resource
{
    protected static ?string $model = stock_product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Stock Product';
    protected static ?string $navigationGroup = 'Inventory';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->label('Product')
                    ->options(product::all()->pluck('product_name', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('stock_id')
                    ->label('Stock')
                    ->options(stock::all()->pluck('quantity', 'id'))
                    ->searchable()
                    ->required(),
                TextInput::make('stock_price')
                    ->label('Stock Price')
                    ->numeric()
                    ->required()
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('product.product_name')->label('Product Name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('stock.quantity')->label('Stock Quantity')->sortable(),
                Tables\Columns\TextColumn::make('stock_price')->label('Stock Price')->sortable()->money('USD'),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListStockProducts::route('/'),
            'create' => Pages\CreateStockProduct::route('/create'),
            'edit' => Pages\EditStockProduct::route('/{record}/edit'),
        ];
    }
}
