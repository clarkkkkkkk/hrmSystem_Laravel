<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Contract extends Model
{
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }

    public function scopeInCompany($query): mixed
    {
        return $query->whereHas('designation', function ($q)
        {
            $q->inCompany();
        });
    }

    public function getDurationAttribute(): string
    {
        return Carbon::parse($this->start_date)->diffForHumans($this->end_date);
    }

    public function scopeSearchByEmployee($query, $name): mixed
    {
        return $query->where('employee', function ($q) use ($name)
        {
            $q->where('name', 'like', '%$name%');
        });
}

    public function getTotalEarnings($monthYear): mixed
    {
        return $this->rate_type == 'monthly' ? $this->rate : $this->rate * Carbon::parse($monthYear)->daysInMonth();
    }

}
