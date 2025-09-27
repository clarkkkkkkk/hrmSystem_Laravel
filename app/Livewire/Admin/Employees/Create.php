<?php

namespace App\Livewire\Admin\Employees;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Livewire\Component;

class Create extends Component
{
    public $employee;
    public $department_id;

    public function rules(): array
    {
        return [
            'employee.name' => 'required|string|max:255',
            'employee.email' => 'required|email|max:255',
            'employee.phone' => 'required|string|max:255',
            'employee.address' => 'required|string|max:255',
            'employee.designation_id' => 'required|existts:designation_id',
        ];
    }

    public function mount()
    {
        $this->employee = new Employee();
    }


    public function save(): mixed
    {
        $this->validate();
        $this->employee->save();
        session()->flash('success', 'Employee created successfully.');
        return $this->redirectIntended('employees.index');
    }
    public function render()
    {
        $designations = Designation::inCompany()->where('department_id', operator: $this->department_id)->get();
        return view('livewire.admin.employees.create',[
            'designations' => $designations,
            'departments' => Department::inCompany()->get(),
        ]);
    }
}
