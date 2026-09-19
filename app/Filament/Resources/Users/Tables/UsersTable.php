<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UsersTable
{
public static function configure(Table $table): Table
{
    return $table
        ->modifyQueryUsing(
            fn (Builder $query) => $query
                ->where('email', '!=', 'azmoleel@gmail.com')
        )
        ->columns([
            TextColumn::make('name')
                ->searchable(),

            TextColumn::make('email')
                ->label('Email address')
                ->searchable(),

            TextColumn::make('email_verified_at')
                ->dateTime()
                ->sortable(),

            IconColumn::make('is_admin')
                ->boolean(),

            IconColumn::make('is_active')
                ->boolean(),

            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([
            //
        ])
        ->recordActions([
            EditAction::make(),
        ])
        ->toolbarActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ]);
}
}
