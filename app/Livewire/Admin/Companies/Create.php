<?php

namespace App\Livewire\Admin\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;
class Create extends Component
{
    use WithFileUploads;
    public $company;
    public $logo;
    public function rules(): array
    {
        return [
            'company.name' => 'required|red|string|max:255',
            'company.email' => 'required|email|max:255',
            'company.website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg.png,jpg|max:2048',
        ];

    } 
    public function mount(): void
    {
        $this->company = new Company();
    }

    public function save(): mixed
    {
        $this->validate();

        if($this->logo){
            $this->company->logo = $this->logo->store('logos', 'public');
        }

        $this->company->save();
        
        session()->flash('success', 'Company created successfully.');
        return $this->redirectIntended(route('companies.index'), navigate: true);
    }
    
    public function render()
    {
        return view('livewire.admin.companies.create');
    }
}
