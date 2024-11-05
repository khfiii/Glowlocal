<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Website;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\WebsiteResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\WebsiteResource\RelationManagers;

class WebsiteResource extends Resource {
    protected static ?string $model = Website::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-asia-australia';

    public static function form( Form $form ): Form {
        return $form
        ->columns( 1 )
        ->schema( [
            TextInput::make( 'title' )
            ->live( onBlur: true )
            ->autoComplete( false )
            ->afterStateUpdated( fn ( Set $set, ?string $state ) => $set( 'slug', Str::slug( $state ) ) ),
            TextInput::make( 'slug' ),
            Select::make( 'product_id' )
            ->relationship( name: 'product', titleAttribute: 'title',  modifyQueryUsing: fn ( $query ) => $query->where( 'is_affiliate', false ), ),
        ] );
    }

    public static function table( Table $table ): Table {
        return $table
        ->columns( [
            TextColumn::make( 'title' ),
            TextColumn::make( 'created_at' )->datetime(),
        ] )
        ->filters( [
            //
        ] )
        ->actions( [
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),

            Tables\Actions\Action::make( 'Preview' )
            ->icon( 'heroicon-m-eye' )
            ->color( 'success' )
            ->url( fn ( Model $record ): string => route( 'page.manage', [ 'website' => $record ] ) )
            ->openUrlInNewTab()
        ] )
        ->bulkActions( [
            Tables\Actions\BulkActionGroup::make( [
                Tables\Actions\DeleteBulkAction::make(),
            ] ),
        ] );
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ManageWebsites::route( '/' ),
        ];
    }
}
