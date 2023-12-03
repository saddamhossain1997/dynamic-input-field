<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function employee()
    {
        return $this->hasOne(Employee::class, 'companies_id', 'id');
    }
}
