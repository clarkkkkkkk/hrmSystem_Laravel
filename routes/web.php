<?php

use App\Livewire\Admin;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function(): void{
    Route::get('/dashboard', Admin\Dashboard::class)->name('dashboard');

        // Companies
        Route::prefix('companies')->name('companies.')->group(function (): void {
            Route::get('/', Admin\Companies\Index::class)->name('index');
            Route::get('/create', Admin\Companies\Create::class)->name('create');
            Route::get('/{id}/edit', Admin\Companies\Edit::class)->name('edit');
        });

        Route::middleware('company.context')->group(function(){
            
        // Departments
        Route::prefix('departments')->name('departments.')->group(function (): void {
            Route::get('/', Admin\Departments\Index::class)->name('index');
            Route::get('/create', Admin\Departments\Create::class)->name('create');
            Route::get('/{id}/edit', Admin\Departments\Edit::class)->name('edit');
        });

        // Designations
        Route::prefix('designations')->name('designations.')->group(function (): void {
            Route::get('/', Admin\Designations\Index::class)->name('index');
            Route::get('/create', Admin\Designations\Create::class)->name('create');
            Route::get('/{id}/edit', Admin\Designations\Edit::class)->name('edit');
        });

        // Employees
        Route::prefix('employees')->name('employees.')->group(function (): void {
            Route::get('/', Admin\Employees\Index::class)->name('index');
            Route::get('/create', Admin\Employees\Create::class)->name('create');
            Route::get('/{id}/edit', Admin\Employees\Edit::class)->name('edit');
        });

        // Contracts
        Route::prefix('contracts')->name('contracts.')->group(function (): void {
            Route::get('/', Admin\Contracts\Index::class)->name('index');
            Route::get('/create', Admin\Contracts\Create::class)->name('create');
            Route::get('/{id}/edit', Admin\Contracts\Edit::class)->name('edit');
        });

        // Payrolls
        Route::prefix('payrolls')->name('payrolls.')->group(function (): void {
            Route::get('/', Admin\Payrolls\Index::class)->name('index');
            Route::get('/create', Admin\Payrolls\Show::class)->name('create');
        });
    });

});/* ->name( 'dashboard'); */


    
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
});

require __DIR__.'/auth.php';
