<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Contract;
use App\Models\Department;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';
    public function delete($id){
        Contract::find($id)->delete();
        session()->flash('success', 'Contract deleted successfully');
    }
    public function render()
    {
        return view('livewire.admin.contracts.index', [
            'departments' => Contract::inCompany()->searchByEmployee($this->search)->paginate(10),
        ]);
    }
}
