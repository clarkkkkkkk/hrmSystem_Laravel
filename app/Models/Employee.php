<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'designation_id',
        'address',
    ];

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }
    public function department(): mixed
    {
        return $this->designation->department;
    }

    public function scopeInCompany($query): mixed
    {
        return $query->whereHas('department', function($q) {
            $q->inCompany();
        });
    }

    public function scopeSearchByName($query, $name): mixed
    {
        return $query->whereHas('name', 'like', '%' . $name . '&');
    }

    
    public function salaries(): HasMany
    {
        return $this->hasMany(Salary::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function getActiveContract($start_date = null, $end_date = null): Contract|null
    {
        $start_date = $start_date ?? now();
        $end_date = $end_date ?? now();
        return $this->contracts()->where('start_date', '<=', $start_date)
        ->where('end_date', '>=', $end_date)->first();
    }
}
