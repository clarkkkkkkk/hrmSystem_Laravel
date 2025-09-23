<?php

namespace App\Livewire\Admin\Employees;

use App\Models\Employee;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function delete($id): void
    {
        Employee::find($id)->delete();
        session()->flash('success', 'Employee deleted successfully.');
    }
    public function render()
    {
        return view('livewire.admin.employees.index', [
            'employees' => Employee::inCompany()->paginate(10)
        ]);
    }
}
