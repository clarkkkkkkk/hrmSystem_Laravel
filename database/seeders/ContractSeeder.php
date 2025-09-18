<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    public function run(): void
    {
        foreach(Employee::all() as $key => $employee){
            $employee->contracts()->create([
                'designation_id' => $employee->designation_id,
                'rate_type' => 'monthly',
                'start_date' => now(),
                'end_date' => now()->addYear(),
                'rate' => 5000,
            ]);
        }
    }
}