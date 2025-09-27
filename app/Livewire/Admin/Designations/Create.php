<?php

namespace App\Livewire\Admin\Designations;

use App\Models\Designation;
use Illuminate\Foundation\Mix;
use Livewire\Component;

class Create extends Component
{
    public $designation;


    public function rules(): array
    {
        return [
            'designation.name' => 'required|string|max:255|unique:designations',
            'designation.department_id' => 'required|exist:departments,id',
        ];
    }

    public function mount()
    {
        $this->designation = new Designation();
    }


    public function save(): mixed
    {
        $this->validate();
        $this->designation->save();
        session()->flash('success', 'Designation created successfully.');
        return $this->redirectIntended('designations.index');
    }
    public function render()
    {
        return view('livewire.admin.designations.create');
    }
}
