<?php

namespace App\Livewire\Admin\Designations;

use App\Models\Designation;
use Livewire\Component;



class Edit extends Component
{
    public $designation;
    public function rules(): array
    {
        return [
            'designation.name' => 'required|string|max:255',
            'designation.department_id' => "required|exists:departments,id" ,
        ];
    }


    public function mount($id)
    {
        $this->designation = Designation::find($id);
    }


    public function save(): mixed
    {
        $this->validate();
        $this->designation->save();
        session()->flash('success', 'Designation Edited Successfully.');
        return $this->redirectIntended('designations.index');
    }


    public function render()
    {
        return view('livewire.admin.designations.edit');
    }
}
