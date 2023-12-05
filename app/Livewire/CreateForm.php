<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Region;
use App\Models\Quarter;
use Livewire\Component;
use App\Models\Township;
use Filament\Forms\Form;
use Livewire\Attributes\On;
use App\Models\FormTemplate;
use App\Models\Nrc;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;

class CreateForm extends Component implements HasForms
{
    use InteractsWithForms;
    public $content;
    public $regions;
    public $townships;
    public $quarters;
    public $nrcs;
    #[On('create')]
    public function create($message)
    {
        $this->content = json_decode($message);
        // dd($this->form->getState()['name']);
        // dd($this->content);
        FormTemplate::create([
            'name' => $this->form->getState()['name'],
            'content' => $this->content
        ]);
        return redirect()->route('filament.admin.pages.list-form-builder');
    }
    public ?array $data = [];
    public function mount(): void
    {
        $this->form->fill();
        $this->regions = Region::get()->pluck('name', 'id')->toArray();
        $this->townships = Township::get()->pluck('name', 'id')->toArray();
        $this->quarters = Quarter::get()->pluck('name', 'id')->toArray();
        $this->nrcs = Nrc::all();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                // ...
            ])
            ->statePath('data');
    }
    public function render(): View
    {
        return view('livewire.create-form');
    }
}
