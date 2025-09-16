<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use phpDocumentor\Reflection\Types\Mixed_;

class Company extends Model
{
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'company_user');
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    public function designations(): mixed
    {
        return $this->throughDepartments()->hasDesignations();
    }

    public function getLogoUrlAtrribute(): string|null
    {
        return $this->logo ? asset('storage/' . $this->logo) : asset('images/cklogocircle.png');
    }
}
