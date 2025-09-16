<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = [
        'name',
        'company_id',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function designations(): HasMany
    {
        return $this->hasMany(Designation::class);
    }

    public function employees(): mixed
    {
        return $this->throughDesignationations()->hasEmployees();
    }
    public function scopeInCompany($query): mixed
    {
        return $query->whereHas('department', function($q) {
            $q->inCompany();
        });
    }
}
