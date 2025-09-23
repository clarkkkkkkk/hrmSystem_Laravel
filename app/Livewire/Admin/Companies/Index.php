<?php

namespace App\Livewire\Admin\Companies;

use App\Models\Company;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithoutUrlPagination as LivewireWithoutUrlPagination;
use Livewire\WithPagination;
use function Pest\Laravel\delete;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination, LivewireWithoutUrlPagination;
    
    public function delete($id): void
    {
        $company = Company::find($id);
        if($company->logo){
            Storage::disk('public')->delete($company -> logo);
        }
        $company->delete();
        session()->flash('message', 'Comapny deleted successfully.');
    }

    public function render(): View
    {
        return view('livewire.admin.comapnies.index', [
            'companies' => Company::latest()->paginate(10),
        ]);
    }
}
