<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{

    public function run(): void{
    DB::table('companies')->insert([
            [
                'name' => 'Google',
                'email' => 'contact@google.com',
                'website' => 'https://www.google.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Microsoft',
                'email' => 'contact@microsoft.com',
                'website' => 'https://www.microsoft.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Apple',
                'email' => 'contact@apple.com',
                'website' => 'https://www.apple.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amazon',
                'email' => 'contact@amazon.com',
                'website' => 'https://www.amazon.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);   

        
        foreach (Company::all() as $key => $company){
            $company->users()->attach(1);
        }
    }
}
