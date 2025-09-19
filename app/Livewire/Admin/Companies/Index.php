<?php

namespace App\Livewire\Admin\Companies;

use App\Models\Company;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

use function Pest\Laravel\delete;

class Index extends Component
{
    public function delete($id): void
    {
        use WithPagination, WithoutUrlPagination;
        $company = Company::find($id);
        $company = delete();
        session()->flash('message', 'Company deleted successfully.');
    }

    public function render(): View
    {
        return view('livewire.admin.companies.index');
    }
}
