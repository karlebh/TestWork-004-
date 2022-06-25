<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'address',
        'owner',
        'employee_count',
        'worth',
        'founded_at',
    ];

    public function user() {
        return $this->belongsTo(Comapny::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
