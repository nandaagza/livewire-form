<?php

namespace App\Livewire;

use App\Models\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Tables\Actions\Action;


class UserFrom extends  Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Form::query())
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('form.name')
                    ->label('Form Name'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('view')
                    ->icon('heroicon-s-eye')
                    ->url(fn (Form $record): string => route('filament.admin.pages.user-view', ['record' => $record])),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.user-from');
    }
}
