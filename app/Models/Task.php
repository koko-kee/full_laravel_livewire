<?php

namespace App\Models;

use App\Enums\PriorityType;
use App\Enums\StatutType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected  $casts = [
        'deadline' => 'date',
        'priority' => PriorityType::class,
        'status' => StatutType::class
    ];

}
