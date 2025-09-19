<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void{

            $companies = Company::all();
    
            foreach($companies as $company){
               $departments = $company->departments()->createMany([
                    [
                        'name' => 'Engineering',
                    ],
                    [
                        'name' => 'Human Resource',
                    ],
                    [
                        'name' => 'Finance',
                    ],                
                    [
                        'name' => 'Marketing',
                    ],
                ]);
        }

        foreach ($departments as $department){
            switch($department->name){
                case 'Engineering':
                    $designations = [
                        'Software Engineer',
                        'Senior Software Engineer',
                        'Engineering Manager',
                        'Director of Engineering',
                    ];
                    break;
            
                case 'Design':
                    $designations = [
                        'UI/UX Designer',
                        'Graphic Designer',
                        'Product Designer',
                        'Design Lead',
                    ];
                    break;
            
                case 'Marketing':
                    $designations = [
                        'Marketing Specialist',
                        'SEO Specialist',
                        'Content Strategist',
                        'Marketing Manager',
                    ];
                    break;
            
                case 'Sales':
                    $designations = [
                        'Sales Representative',
                        'Account Executive',
                        'Sales Manager',
                        'Director of Sales',
                    ];
                    break;
            
                case 'Human Resources':
                    $designations = [
                        'HR Coordinator',
                        'Recruiter',
                        'HR Manager',
                        'HR Director',
                    ];
                    break;
            
                case 'Finance':
                    $designations = [
                        'Accountant',
                        'Financial Analyst',
                        'Finance Manager',
                        'Chief Financial Officer (CFO)',
                    ];
                    break;
            
                case 'Customer Support':
                    $designations = [
                        'Support Agent',
                        'Senior Support Specialist',
                        'Support Team Lead',
                        'Head of Customer Support',
                    ];
                    break;

                    default:
                        $designations = [];
                        break;
            }

            foreach ($designations as $designation){
                $department->designations()->create([
                    'name'=>$designation,
                ]);
            }
        }
    }
}