<?php 

use App\Models\Company;

if (!function_exists('getCompanyName')) {
    function getCompany()
    {
        return Company::findOrFail(session('company_id'));
    }
}