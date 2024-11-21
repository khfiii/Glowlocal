<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Article;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use RalphJSmit\Filament\SEO\SEO;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ArticleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\ArticleResource\RelationManagers;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ArticleResource extends Resource {
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form( Form $form ): Form {
        return $form
        ->columns( 1 )
        ->schema( [
            SpatieMediaLibraryFileUpload::make( 'article_images' )
            ->collection( 'article_images' )
            ->optimize( 'webp' )
            ->image()
            ->required(),
            TextInput::make( 'title' ),
            TextInput::make( 'slug' ),
            Select::make( 'article_category_id' )
            ->required()
            ->relationship( name: 'category', titleAttribute: 'title' )
            ->createOptionForm( [
                Forms\Components\TextInput::make( 'title' )
                ->required(),
            ] ),
            TinyEditor::make( 'content' ),
            Section::make( 'Seo' )
            ->schema( [
                TextInput::make( 'keywords' )
                ->required(),
                SEO::make()
            ] )
        ] );
    }

    public static function table( Table $table ): Table {
        return $table
        ->columns( [
            TextColumn::make( 'title' ),
            SpatieMediaLibraryImageColumn::make( 'article_images' )
            ->collection( 'article_images' ),
            TextColumn::make( 'created_at' ),
        ] )
        ->filters( [
            //
        ] )
        ->actions( [
            Tables\Actions\DeleteAction::make(),
            Tables\Actions\EditAction::make(),
        ] )
        ->bulkActions( [
            Tables\Actions\BulkActionGroup::make( [
                Tables\Actions\DeleteBulkAction::make(),
            ] ),
        ] );
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListArticles::route( '/' ),
            'create' => Pages\CreateArticle::route( '/create' ),
            'edit' => Pages\EditArticle::route( '/{record}/edit' ),
        ];
    }
}
