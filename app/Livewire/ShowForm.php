<?php

namespace App\Livewire;

use App\Models\FormTemplate;
use Livewire\Component;

class ShowForm extends Component
{
    public  $record_id;
    public FormTemplate $form_template;

    public function mount()
    {
        $this->record_id = request()->query('record');
        $this->form_template = FormTemplate::find($this->record_id);
    }

    public function render()
    {
        return view('livewire.show-form');
    }
}
