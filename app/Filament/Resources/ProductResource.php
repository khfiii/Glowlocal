<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use RalphJSmit\Filament\SEO\SEO;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource {
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form( Form $form ): Form {
        return $form
        ->columns( 1 )
        ->schema( [
            TextInput::make( 'title' )
            ->required(),
            TextInput::make( 'rating' )
            ->required(),
            Select::make( 'category_id' )
            ->required()
            ->relationship( name: 'category', titleAttribute: 'name' )
            ->createOptionForm( [
                Forms\Components\TextInput::make( 'name' )
                ->required(),
            ] ),
            TextInput::make( 'price' )
            ->required(),
            MarkdownEditor::make( 'description' )
            ->hidden( fn( Get $get )=> $get( 'is_affiliate' ) ),
            SpatieMediaLibraryFileUpload::make( 'image' )
            ->collection( 'product_images' )
            ->optimize( 'webp' )
            ->multiple()
            ->image()
            ->required(),
            TextInput::make( 'product_url' )
            ->required(),
            Card::make( [
                SEO::make()
            ] ),
        ] );
    }

    public static function table( Table $table ): Table {
        return $table
        ->columns( [
            TextColumn::make( 'title' ),
            TextColumn::make( 'price' )
            ->money( 'IDR', locale:'id' ),
            SpatieMediaLibraryImageColumn::make( 'image' )
            ->collection( 'product_images' )
        ] )
        ->filters( [
            //
        ] )
        ->actions( [
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ] )
        ->bulkActions( [
            Tables\Actions\BulkActionGroup::make( [
                Tables\Actions\DeleteBulkAction::make(),
            ] ),
        ] );
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ManageProducts::route( '/' ),
        ];
    }
}
