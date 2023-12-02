<?php

namespace App\Livewire;

use Filament\Tables;
use Livewire\Component;
use Filament\Tables\Table;
use App\Models\FormTemplate;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListForm extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(FormTemplate::query())
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')
                    ->searchable()
                // TextColumn::make('content')
                //     ->getStateUsing(function (Model $FormTemplate) {

                //         return json_encode($FormTemplate->content);
                //     }),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('view')
                    ->icon('heroicon-o-eye')
                    ->url(fn (FormTemplate $record): string => route('filament.admin.pages.show-form-builder', ['record' => $record])),
                DeleteAction::make(),
            ])
            ->bulkActions([]);
    }

    public function createFormTemplate()
    {
        return redirect()->route('filament.admin.pages.form-builder');
    }

    public function render(): View
    {
        return view('livewire.list-form');
    }
}
